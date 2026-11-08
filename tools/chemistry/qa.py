"""
QA for the chemistry pack.

Every calculator is checked four ways against the site's own engine:

  1. the page's values, compared with an independent Python evaluation;
  2. 200 random input sets, spread over three orders of magnitude either side;
  3. a round trip — each input solved from the results it produces;
  4. degenerate inputs (zeros, blanks) must not produce infinities or fatals;
  5. values worked out by hand from the chemistry, not from the formulas.

    python3 tools/chemistry/qa.py            # everything written so far
    python3 tools/chemistry/qa.py mole,ph    # just these
"""

from __future__ import annotations

import json
import math
import os
import random
import subprocess
import sys

sys.path.insert(0, os.path.dirname(__file__))

from lib import Spec, solve  # noqa: E402
import build  # noqa: E402

SITE = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
TOL = 1e-7

# Values worked out by hand from the chemistry, not from the formulas: if one of
# these moves, an expression has changed meaning.
LITERATURE: dict[str, list[tuple[dict, dict, float]]] = {
    "mole": [({"mass": 36.46, "molar_mass": 36.46}, {"moles": 1.0, "particles": 6.02214076e23}, 1e-9)],
    "molar-mass": [({"mass": 5.85, "moles": 0.1}, {"molar_mass": 58.5}, 1e-9)],
    "molecular-weight": [({"mass": 20, "moles": 0.25}, {"mw_da": 80.0, "mw_kda": 0.08}, 1e-9)],
    "grams-to-moles": [({"mass": 100, "molar_mass": 18.015}, {"moles": 5.551}, 1e-3),
                       ({"mass": 58.44, "molar_mass": 58.44}, {"millimoles": 1000.0}, 1e-9)],
    "moles-to-atoms": [({"moles": 0.5, "atoms_per_unit": 2}, {"atoms": 6.02214076e23}, 1e-9)],
    "avogadro": [({"particles": 6.02214076e23, "moles": 1}, {"avogadro": 6.02214076e23}, 1e-9)],
    "concentration": [({"mass_solute": 9, "volume": 1, "molar_mass": 58.44}, {"molarity": 0.15399}, 1e-4)],
    "molarity": [({"moles": 0.5, "volume": 0.25}, {"molarity": 2.0, "millimolarity": 2000.0}, 1e-9)],
    "molality": [({"moles": 1, "solvent_mass_g": 1000}, {"molality": 1.0}, 1e-9),
                 ({"moles": 0.05844, "solvent_mass_g": 1000}, {"molality": 0.05844}, 1e-9)],
    "normality": [({"molarity": 1, "n_factor": 2, "volume": 1}, {"normality": 2.0, "equivalents": 2.0}, 1e-9),
                  ({"molarity": 0.02, "n_factor": 5, "volume": 0.25}, {"normality": 0.1, "equivalents": 0.025}, 1e-9)],
    "mole-fraction": [({"n1": 2, "n2": 6}, {"x1": 0.25, "x2": 0.75}, 1e-9)],
    "mass-percent": [({"mass_solute": 5, "mass_solution": 100}, {"percent": 5.0, "g_per_kg": 50.0}, 1e-9),
                     ({"mass_solute": 35, "mass_solution": 1000}, {"percent": 3.5}, 1e-9)],
    "percent-solution": [({"mass_solute": 0.9, "volume": 100}, {"percent_wv": 0.9, "g_per_l": 9.0}, 1e-9)],
    "mass-concentration-to-molar-concentration": [({"mass_conc": 10, "molar_mass": 58.44}, {"molarity": 0.17112}, 1e-4)],
    "percentage-concentration-to-molarity": [({"percent": 37, "density": 1.19, "molar_mass": 36.46}, {"molarity": 12.08}, 1e-2),
                                             ({"percent": 98, "density": 1.84, "molar_mass": 98.079}, {"molarity": 18.4}, 1e-1)],
    "ppm-to-molarity": [({"ppm": 1000, "molar_mass": 58.44}, {"molarity": 0.017112, "mg_per_l": 1000.0}, 1e-4)],
    "dilution-factor": [({"initial_volume": 1, "final_volume": 10}, {"dilution_factor": 10.0, "diluent_volume": 9.0,
                                                                   "fraction_remaining": 0.1}, 1e-9)],
    "solution-dilution": [({"c1": 2, "v1": 50, "v2": 500}, {"c2": 0.2, "diluent_volume": 450.0}, 1e-9),
                          ({"c1": 1, "v1": 1, "v2": 1000}, {"c2": 0.001}, 1e-12)],
    "ph": [({"h_conc": 1e-7}, {"ph": 7.0, "poh": 7.0, "oh_conc": 1e-7}, 1e-12),
           ({"h_conc": 1e-3}, {"ph": 3.0, "poh": 11.0}, 1e-9)],
    "hydrogen-ion-concentration": [({"ph": 7.4}, {"h_conc": 3.98e-8, "oh_conc": 2.51e-7}, 1e-8),
                                   ({"ph": 2}, {"h_conc": 1e-2}, 1e-12)],
    "pka": [({"ka": 1.8e-5}, {"pka": 4.7447, "pkb": 9.2553}, 1e-4),
            ({"ka": 1.0}, {"pka": 0.0, "kb": 1e-14}, 1e-12)],
    "buffer-ph": [({"pka": 4.76, "base_conc": 0.1, "acid_conc": 0.1}, {"ph": 4.76, "ratio": 1.0}, 1e-9),
                  ({"pka": 4.76, "base_conc": 0.2, "acid_conc": 0.1}, {"ph": 5.061}, 1e-4)],
    "henderson-hasselbalch": [({"ph": 4.76, "base_conc": 0.1, "acid_conc": 0.1}, {"pka": 4.76}, 1e-9)],
    "titration": [({"c1": 0.1, "v1": 25, "n1": 1, "v2": 25, "n2": 1}, {"c2": 0.1, "moles_titrant": 2.5}, 1e-9),
                  ({"c1": 0.1, "v1": 20, "n1": 2, "v2": 25, "n2": 1}, {"c2": 0.04, "moles_analyte": 1.0}, 1e-9)],
    "neutralization": [({"acid_conc": 1, "acid_volume": 0.25, "acid_equivalents": 2,
                        "base_equivalents": 1, "base_molar_mass": 40}, {"base_mass": 20.0, "equivalents": 0.5}, 1e-9)],
    "buffer-capacity": [({"moles_added": 0.01, "ph_change": 0.05, "volume": 1}, {"capacity": 0.2}, 1e-9)],
    "equilibrium-constant": [({"product_conc": 0.8, "product_coeff": 1, "reactant_conc": 0.2,
                               "reactant_coeff": 1, "temperature": 298.15},
                              {"k": 4.0, "gibbs_standard": -3.436}, 1e-3)],
    "kp": [({"kc": 4, "temperature": 298.15, "delta_n": 0}, {"kp": 4.0, "kp_over_kc": 1.0}, 1e-9),
           ({"kc": 1, "temperature": 500, "delta_n": 1}, {"kp": 41.03}, 1e-2)],
    "reaction-quotient": [({"product_conc": 0.1, "reactant_conc": 0.5, "k": 4, "temperature": 298.15},
                           {"q": 0.2, "delta_g": -7.426}, 1e-3)],
    "gibbs-energy": [({"enthalpy": -92.2, "entropy": -198.7, "temperature": 298.15},
                      {"delta_g": -32.96, "t_switch": 464.02}, 2e-2)],
    "entropy": [({"heat": 40700, "temperature": 373.15, "moles": 1}, {"delta_s_molar": 109.07}, 1e-2)],
    "nernst-equation": [({"e0": 1.1, "n": 2, "q": 1, "temperature": 298.15}, {"e": 1.1, "slope_mv": 29.58}, 1e-2),
                        ({"e0": 1.1, "n": 2, "q": 10, "temperature": 298.15}, {"e": 1.0704}, 1e-3)],
    "electromotive-force": [({"cathode": 0.34, "anode": -0.76, "n": 2},
                             {"emf": 1.1, "delta_g": -212.27}, 1e-2)],
    "freezing-point-depression": [({"kf": 1.86, "molality": 1, "van_t_hoff": 2, "pure_fp": 0},
                                   {"delta_tf": 3.72, "solution_fp": -3.72}, 1e-9)],
    "boiling-point-elevation": [({"kb": 0.512, "molality": 1, "van_t_hoff": 2, "pure_bp": 100},
                                 {"delta_tb": 1.024, "solution_bp": 101.024}, 1e-9)],
    "osmotic-pressure": [({"van_t_hoff": 2, "molarity": 0.154, "temperature": 310.15},
                          {"pressure_kpa": 794.3, "osmolarity": 0.308}, 2e-1)],
    "raoults-law": [({"mole_fraction": 0.3, "pure_pressure": 2.34}, {"partial_pressure": 0.702}, 1e-9)],
    "partial-pressure": [({"mole_fraction": 0.21, "total_pressure": 101.3}, {"partial_pressure": 21.273}, 1e-2)],
    # ---- batch 3: stoichiometry, yield, gas and lab practice
    "empirical-formula": [({"percent_a": 69.94, "molar_mass_a": 55.845, "percent_b": 30.06,
                            "molar_mass_b": 15.999, "compound_molar_mass": 159.69},
                           {"ratio_a": 1.0, "ratio_b": 1.5, "multiplier": 2.0}, 2e-3)],
    "percent-composition": [({"atoms": 1, "atomic_mass": 22.99, "compound_molar_mass": 58.44},
                             {"element_mass": 22.99, "percent": 39.3395, "remainder": 60.6605}, 1e-3),
                            ({"atoms": 2, "atomic_mass": 1.008, "compound_molar_mass": 18.015},
                             {"percent": 11.1907}, 1e-3)],
    "theoretical-yield": [({"reagent_mass": 10, "reagent_molar_mass": 100.09, "mole_ratio": 1,
                            "product_molar_mass": 56.08},
                           {"reagent_moles": 0.09991, "product_mass": 5.60296}, 1e-3)],
    "percent-yield": [({"actual_mass": 8.5, "theoretical_mass": 10},
                       {"percent_yield": 85.0, "mass_lost": 1.5, "yield_fraction": 0.85}, 1e-9)],
    "actual-yield": [({"theoretical_mass": 10, "percent_yield": 85},
                      {"actual_mass": 8.5, "mass_lost": 1.5, "loss_percent": 15.0}, 1e-9)],
    "atom-economy": [({"product_molar_mass": 56.08, "products_molar_mass": 100.09},
                      {"atom_economy": 56.0296, "waste_per_100g": 78.4779}, 1e-3)],
    "molar-ratio": [({"moles_a": 0.5, "coeff_a": 1, "coeff_b": 3},
                     {"moles_b": 1.5, "ratio": 3.0, "a_per_b": 0.333333}, 1e-4),
                    ({"moles_a": 0.25, "coeff_a": 2, "coeff_b": 3}, {"moles_b": 0.375}, 1e-9)],
    "molar-mass-of-gas": [({"mass": 32, "pressure": 101.325, "volume": 22.414, "temperature": 273.15},
                           {"molar_mass": 31.998, "density": 1.4277}, 1e-2),
                          ({"mass": 44, "pressure": 101.325, "volume": 22.414, "temperature": 273.15},
                           {"molar_mass": 43.997}, 2e-2)],
    "standard-temperature-and-pressure": [({"moles": 1, "temperature": 273.15, "pressure": 101.325},
                                           {"volume": 22.413, "molar_volume": 22.413}, 2e-3),
                                          ({"moles": 1, "temperature": 298.15, "pressure": 101.325},
                                           {"volume": 24.465}, 1e-2)],
    "combustion-analysis": [({"sample_mass": 1.0, "co2_mass": 1.5, "h2o_mass": 0.61},
                             {"carbon_mass": 0.40937, "hydrogen_mass": 0.06825,
                              "oxygen_mass": 0.52238, "percent_carbon": 40.937}, 2e-3)],
    "combustion-reaction": [({"carbon_atoms": 1, "hydrogen_atoms": 4, "fuel_moles": 1},
                             {"oxygen_moles": 2.0, "co2_moles": 1.0, "water_moles": 2.0,
                              "oxygen_mass": 63.996}, 1e-6),
                            ({"carbon_atoms": 8, "hydrogen_atoms": 18, "fuel_moles": 1},
                             {"oxygen_moles": 12.5, "co2_moles": 8.0}, 1e-9)],
    "heat-of-combustion": [({"sample_mass": 0.5, "molar_mass": 46.07, "temperature_rise": 1.5,
                             "heat_capacity": 10},
                            {"heat_released": 15.0, "moles_burnt": 0.010853, "molar_heat": 1382.0,
                             "specific_heat": 30.0}, 1.0)],
    "alligation": [({"strong_percent": 70, "weak_percent": 0, "target_percent": 30},
                    {"parts_strong": 30.0, "parts_weak": 40.0, "ratio": 0.75}, 1e-9)],
    "serial-dilution": [({"stock_conc": 1, "dilution_factor": 10, "steps": 3},
                         {"final_conc": 0.001, "total_factor": 1000.0}, 1e-12),
                        ({"stock_conc": 0.5, "dilution_factor": 2, "steps": 5},
                         {"final_conc": 0.015625}, 1e-9)],
    "bleach-dilution": [({"stock_percent": 5, "target_ppm": 1000, "final_volume": 1},
                         {"stock_volume": 20.0, "water_volume": 980.0, "dilution_factor": 50.0}, 1e-9)],
    "reconstitution": [({"vial_mass": 500, "diluent_volume": 10, "dose": 250},
                        {"concentration": 50.0, "draw_volume": 5.0, "remaining_mass": 250.0}, 1e-9)],
    "resuspension": [({"powder_mass": 10, "target_conc": 1},
                      {"solvent_volume": 10.0, "conc_ug_ul": 1.0, "total_aliquot_1ml": 100.0}, 1e-9)],
    "mixing-ratio": [({"part_a": 1, "part_b": 3, "total_volume": 1},
                      {"volume_a": 250.0, "volume_b": 750.0, "share_a": 25.0}, 1e-9)],
    "cubic-cell": [({"atoms_per_cell": 4, "molar_mass": 63.546, "edge_length": 3.615},
                    {"cell_volume": 4.7249e-23, "density": 8.9312}, 5e-3),
                   ({"atoms_per_cell": 2, "molar_mass": 55.845, "edge_length": 2.866},
                    {"density": 7.874}, 1e-2)],
    "average-atomic-mass": [({"abundance_1": 75.77, "mass_1": 34.9689, "abundance_2": 24.23,
                              "mass_2": 36.9659},
                             {"average_mass": 35.4528, "total_abundance": 100.0,
                              "heavier_fraction": 25.266}, 2e-3),
                            ({"abundance_1": 69.15, "mass_1": 62.9296, "abundance_2": 30.85,
                              "mass_2": 64.9278}, {"average_mass": 63.546}, 1e-2)],

    # ---- batch 4: kinetics, decay, structure and ionic solutions
    "activation-energy": [({"k1": 0.001, "t1": 300, "k2": 0.01, "t2": 320},
                           {"activation_energy": 91.895, "ratio": 10.0}, 0.01),
                          ({"k1": 2e-4, "t1": 290, "k2": 4e-4, "t2": 300},
                           {"activation_energy": 50.137}, 0.01)],
    "arrhenius-equation": [({"a_factor": 1e13, "ea": 100, "temp": 298.15},
                            {"rate_constant": 3.0252e-5, "boltzmann_fraction": 3.0252e-18}, 1e-3),
                           ({"a_factor": 1e11, "ea": 20, "temp": 600},
                            {"rate_constant": 1.814606e9}, 1e4)],
    "rate-constant": [({"c0": 1, "ct": 0.5, "time": 60},
                       {"rate_constant": 0.0115525, "half_life": 60.0,
                        "fraction_remaining": 50.0}, 1e-4),
                      ({"c0": 0.1, "ct": 0.01, "time": 3600},
                       {"rate_constant": 6.3961e-4, "half_life": 1083.708}, 0.1)],
    "half-life": [({"initial_amount": 100, "half_life": 6, "time": 24},
                   {"remaining": 6.25, "half_lives": 4.0, "fraction_remaining": 6.25}, 1e-9),
                  ({"initial_amount": 80, "half_life": 12.3, "time": 36.9},
                   {"remaining": 10.0}, 1e-9)],
    "radioactive-decay": [({"initial_activity": 1000, "half_life": 3600, "time": 7200},
                           {"activity": 250.0, "decay_constant": 1.92541e-4,
                            "atoms_initial": 5193702.15, "fraction_decayed": 75.0}, 5.0),
                          ({"initial_activity": 10000, "half_life": 3600, "time": 1800},
                           {"activity": 7071.068}, 0.01)],
    "carbon-dating": [({"measured_activity": 3.4, "modern_activity": 13.6, "half_life": 5730},
                       {"age": 11460.0, "fraction_modern": 25.0, "half_lives": 2.0}, 1e-6),
                      ({"measured_activity": 6.8, "modern_activity": 13.6, "half_life": 5730},
                       {"age": 5730.0}, 1e-6)],
    "q10": [({"rate1": 1, "temp1": 25, "rate2": 2, "temp2": 35},
             {"q10": 2.0, "rate_ratio": 2.0, "rate_plus_10": 2.0}, 1e-9),
            ({"rate1": 1, "temp1": 10, "rate2": 4, "temp2": 30}, {"q10": 2.0}, 1e-9),
            ({"rate1": 5, "temp1": 20, "rate2": 15, "temp2": 30}, {"q10": 3.0}, 1e-9)],
    "grahams-law-of-diffusion": [({"molar_mass_1": 2.016, "molar_mass_2": 32.0, "time_1": 10},
                                  {"rate_ratio": 3.9841, "time_2": 39.841,
                                   "relative_rate": 25.1}, 1e-3),
                                 ({"molar_mass_1": 4.0, "molar_mass_2": 44.0, "time_1": 20},
                                  {"rate_ratio": 3.3166, "time_2": 66.332}, 1e-3)],
    "diffusion-coefficient": [({"temperature": 298.15, "viscosity": 0.89, "radius": 5},
                               {"diffusion_coefficient": 4.90746e-11, "d_um2_s": 49.0746,
                                "time_one_um": 0.040753}, 1e-3),
                              ({"temperature": 310.15, "viscosity": 1.0, "radius": 3},
                               {"diffusion_coefficient": 7.57239e-11}, 1e-3)],
    "electrolysis": [({"current": 1, "time": 3600, "molar_mass": 63.546, "electrons": 2},
                      {"charge": 3600.0, "mass": 1.1855, "moles": 0.018656}, 1e-4),
                     ({"current": 2, "time": 1800, "molar_mass": 107.87, "electrons": 1},
                      {"mass": 4.0248}, 1e-4)],
    "atom": [({"atomic_number": 11, "mass_number": 23, "charge": 0},
              {"protons": 11.0, "neutrons": 12.0, "electrons": 11.0}, 1e-9),
             ({"atomic_number": 26, "mass_number": 56, "charge": 3},
              {"protons": 26.0, "neutrons": 30.0, "electrons": 23.0}, 1e-9),
             ({"atomic_number": 8, "mass_number": 18, "charge": -2},
              {"neutrons": 10.0, "electrons": 10.0}, 1e-9)],
    "atomic-mass": [({"atomic_mass": 55.845, "atoms": 1},
                     {"mass_g": 9.27328e-23, "mass_kg": 9.27328e-26,
                      "atoms_per_gram": 1.078367e22}, 1e17),
                    ({"atomic_mass": 1.008, "atoms": 1}, {"mass_g": 1.67382e-24}, 1e-4)],
    "bond-order": [({"bonding_e": 8, "antibonding_e": 2},
                    {"bond_order": 3.0, "total_electrons": 10.0, "net_bonding": 6.0}, 1e-9),
                   ({"bonding_e": 8, "antibonding_e": 4}, {"bond_order": 2.0}, 1e-9),
                   ({"bonding_e": 10, "antibonding_e": 4}, {"bond_order": 3.0}, 1e-9)],
    "electronegativity": [({"ionization_energy": 5.14, "electron_affinity": 0.55},
                           {"electronegativity": 2.845, "energy_gap": 4.59,
                            "vs_hydrogen": -4.335}, 1e-9),
                          ({"ionization_energy": 12.967, "electron_affinity": 3.613},
                           {"electronegativity": 8.29}, 1e-9),
                          ({"ionization_energy": 13.598, "electron_affinity": 0.754},
                           {"electronegativity": 7.176}, 1e-9)],
    "lattice-energy": [({"charge_cation": 1, "charge_anion": 1, "ions": 2,
                         "radius_cation": 102, "radius_anion": 181},
                        {"lattice_energy": 746.223, "distance": 283.0,
                         "energy_per_ion": 373.1115}, 0.01),
                       ({"charge_cation": 2, "charge_anion": 2, "ions": 2,
                         "radius_cation": 72, "radius_anion": 140},
                        {"lattice_energy": 3799.284}, 0.01),
                       ({"charge_cation": 1, "charge_anion": 1, "ions": 2,
                         "radius_cation": 138, "radius_anion": 181},
                        {"lattice_energy": 672.382}, 0.01)],
    "effective-charge": [({"atomic_number": 11, "shielding": 8.8, "principal_n": 3},
                          {"effective_charge": 2.2, "orbital_energy": -7.31378,
                           "ionization_energy": 7.31378}, 1e-4),
                         ({"atomic_number": 17, "shielding": 10.9, "principal_n": 3},
                          {"effective_charge": 6.1, "orbital_energy": -56.2284}, 1e-4),
                         ({"atomic_number": 3, "shielding": 1.7, "principal_n": 2},
                          {"effective_charge": 1.3}, 1e-9)],
    "percent-ionic-character": [({"delta_en": 0.96}, {"percent_ionic": 20.5784,
                                                      "percent_covalent": 79.4216}, 1e-4),
                                ({"delta_en": 2.1}, {"percent_ionic": 66.7960}, 1e-4),
                                ({"delta_en": 1.7}, {"percent_ionic": 51.4463}, 1e-4),
                                ({"delta_en": 0.4}, {"percent_ionic": 3.9211}, 1e-4)],
    "double-bond-equivalent": [({"carbon": 6, "hydrogen": 6, "nitrogen": 0, "halogen": 0},
                                {"dbe": 4.0, "max_hydrogen": 14.0,
                                 "hydrogen_deficit": 8.0}, 1e-9),
                               ({"carbon": 4, "hydrogen": 9, "nitrogen": 1, "halogen": 0},
                                {"dbe": 1.0}, 1e-9),
                               ({"carbon": 6, "hydrogen": 12, "nitrogen": 0, "halogen": 0},
                                {"dbe": 1.0}, 1e-9),
                               ({"carbon": 1, "hydrogen": 1, "nitrogen": 0, "halogen": 3},
                                {"dbe": 0.0}, 1e-9)],
    "degree-of-unsaturation": [({"rings": 1, "double_bonds": 3, "triple_bonds": 0},
                                {"degree_of_unsaturation": 4.0, "pi_bonds": 3.0,
                                 "missing_hydrogens": 8.0}, 1e-9),
                               ({"rings": 0, "double_bonds": 0, "triple_bonds": 1},
                                {"degree_of_unsaturation": 2.0}, 1e-9)],
    "activity-coefficient": [({"ionic_strength": 0.01, "charge": 1, "constant_a": 0.509},
                              {"activity_coefficient": 0.889406, "log_gamma": -0.0509,
                               "shortfall": 11.0594}, 1e-4),
                             ({"ionic_strength": 0.01, "charge": 2, "constant_a": 0.509},
                              {"activity_coefficient": 0.625749}, 1e-4),
                             ({"ionic_strength": 0.1, "charge": 1, "constant_a": 0.509},
                              {"activity_coefficient": 0.690303}, 1e-4)],

    # ---- batch 5a: analytical, water and phase-equilibrium pages
    "beer-lambert-law": [({"absorptivity": 15000, "concentration": 0.0002, "path_length": 1},
                          {"absorbance": 3.0, "transmittance": 0.1, "absorbed": 99.9}, 1e-6),
                         ({"absorptivity": 6220, "concentration": 0.0001, "path_length": 1},
                          {"absorbance": 0.622}, 1e-6),
                         ({"absorptivity": 15000, "concentration": 0.00004, "path_length": 1},
                          {"absorbance": 0.6}, 1e-6)],
    "calibration-curve": [({"x1": 0.1, "y1": 0.12, "x2": 0.5, "y2": 0.55, "x3": 1.0, "y3": 1.08,
                            "sample_signal": 0.72},
                           {"slope": 1.066393, "intercept": 0.014583, "concentration": 0.66149,
                            "r_squared": 0.999984, "mean_x": 0.533333, "mean_y": 0.583333}, 1e-4),
                          ({"x1": 1, "y1": 0.2, "x2": 2, "y2": 0.4, "x3": 3, "y3": 0.6,
                            "sample_signal": 0.5},
                           {"slope": 0.2, "intercept": 0.0, "concentration": 2.5,
                            "r_squared": 1.0}, 1e-9)],
    "chemical-oxygen-demand": [({"blank_titre": 25.0, "sample_titre": 16.5, "fas_molarity": 0.1,
                                 "sample_volume": 20},
                                {"cod": 340.0, "oxygen_mass": 6.8, "cod_g_per_l": 0.34}, 1e-6),
                               ({"blank_titre": 25, "sample_titre": 20, "fas_molarity": 0.1,
                                 "sample_volume": 20}, {"cod": 200.0}, 1e-6)],
    "tds": [({"conductivity": 500, "factor": 0.64}, {"tds": 320.0, "tds_g_per_l": 0.32,
                                                     "grains_per_gallon": 18.694}, 1e-3),
            ({"conductivity": 2000, "factor": 0.55}, {"tds": 1100.0}, 1e-6)],
    "water-hardness": [({"calcium": 80, "magnesium": 24}, {"hardness": 298.62, "hardness_mmol": 2.9836,
                                                           "grains": 17.445}, 1e-2),
                       ({"calcium": 200, "magnesium": 48}, {"hardness": 697.14}, 1e-2)],
    "ionic-strength": [({"conc_1": 0.1, "charge_1": 1, "conc_2": 0.1, "charge_2": 1,
                        "conc_3": 0, "charge_3": 1},
                       {"ionic_strength": 0.1, "contribution_1": 0.05,
                        "contribution_2": 0.05}, 1e-9),
                      ({"conc_1": 0.1, "charge_1": 2, "conc_2": 0.2, "charge_2": 1,
                        "conc_3": 0, "charge_3": 1}, {"ionic_strength": 0.3}, 1e-9),
                      ({"conc_1": 0.05, "charge_1": 2, "conc_2": 0.05, "charge_2": 2,
                        "conc_3": 0, "charge_3": 1}, {"ionic_strength": 0.2}, 1e-9)],
    "vapour-pressure-of-water": [({"temperature": 25}, {"pressure_mmhg": 23.6864,
                                                        "pressure_kpa": 3.15792,
                                                        "pressure_atm": 0.0311711}, 1e-4),
                                 ({"temperature": 100}, {"pressure_mmhg": 760.086}, 0.01),
                                 ({"temperature": 20}, {"pressure_mmhg": 17.4733}, 1e-3)],
    "vapor-pressure": [({"pressure_1": 760, "temp_1": 373.15, "enthalpy": 40.66, "temp_2": 298.15},
                        {"pressure_2": 28.1194, "pressure_ratio": 0.036999,
                         "pressure_2_kpa": 3.74893}, 1e-3),
                       ({"pressure_1": 760, "temp_1": 373.15, "enthalpy": 40.66, "temp_2": 323.15},
                        {"pressure_2": 100.03}, 0.05)],
    "boiling-point": [({"normal_bp": 100, "enthalpy": 40.66, "pressure": 70},
                       {"boiling_point_k": 362.909, "boiling_point_c": 89.7592,
                        "shift": -10.2408}, 1e-2),
                      ({"normal_bp": 100, "enthalpy": 40.66, "pressure": 101.325},
                       {"boiling_point_c": 100.0, "shift": 0.0}, 1e-6),
                      ({"normal_bp": 78.37, "enthalpy": 38.56, "pressure": 50},
                       {"boiling_point_c": 60.5}, 0.1)],
    "boiling-point-altitude": [({"altitude": 1500, "enthalpy": 40.66},
                                {"pressure": 84.8167, "boiling_point": 95.0044,
                                 "shift": -4.9956}, 1e-2),
                               ({"altitude": 0, "enthalpy": 40.66},
                                {"pressure": 101.325, "boiling_point": 100.0}, 1e-6),
                               ({"altitude": 3000, "enthalpy": 40.66},
                                {"pressure": 71.0, "boiling_point": 90.1}, 0.1)],

    # ---- batch 5b: biochemistry, solids and engineering practice
    "phase-rule": [({"components": 2, "phases": 1}, {"freedom": 3, "at_fixed_pressure": 2,
                                                     "max_phases": 4}, 1e-9),
                   ({"components": 1, "phases": 3}, {"freedom": 0, "at_fixed_pressure": -1}, 1e-9),
                   ({"components": 3, "phases": 2}, {"freedom": 3, "at_fixed_pressure": 2}, 1e-9)],
    "enzyme-activity": [({"delta_a": 0.5, "extinction": 6.22, "path_length": 1, "time": 1,
                          "volume": 1, "dilution": 1},
                         {"activity_per_ml": 0.080386, "total_activity": 0.080386,
                          "sample_activity": 0.080386}, 1e-6),
                        ({"delta_a": 0.15, "extinction": 6.22, "path_length": 1, "time": 1,
                          "volume": 1, "dilution": 10},
                         {"activity_per_ml": 0.024116, "sample_activity": 0.241158}, 1e-6),
                        ({"delta_a": 1.244, "extinction": 6.22, "path_length": 1, "time": 2,
                          "volume": 0.2, "dilution": 1},
                         {"activity_per_ml": 0.1, "total_activity": 0.02}, 1e-9)],
    "michaelis-menten-equation": [({"vmax": 100, "km": 0.5, "substrate": 1.0},
                                   {"velocity": 66.6667, "fraction_of_vmax": 66.6667,
                                    "substrate_ratio": 2.0}, 1e-3),
                                  ({"vmax": 50, "km": 2, "substrate": 2}, {"velocity": 25.0}, 1e-9),
                                  ({"vmax": 50, "km": 2, "substrate": 20},
                                   {"velocity": 45.4545, "fraction_of_vmax": 90.9091}, 1e-3)],
    "protein-solubility": [({"s0": 10, "ks": 2.5, "ionic_strength": 0.5},
                            {"solubility": 2.865048, "fraction_remaining": 28.6505,
                             "fold_reduction": 3.49034}, 1e-4),
                           ({"s0": 20, "ks": 3, "ionic_strength": 1.0}, {"solubility": 0.995741}, 1e-5),
                           ({"s0": 20, "ks": 1.5, "ionic_strength": 1.0},
                            {"solubility": 4.462603, "fold_reduction": 4.48169}, 1e-4)],
    "isoelectric-point": [({"pka1": 2.34, "pka2": 9.60, "ph": 7.0},
                           {"pi": 5.97, "net_charge": -0.002484,
                            "fraction_positive": 0.0000219}, 1e-5),
                          ({"pka1": 2.19, "pka2": 9.67, "ph": 6.0}, {"pi": 5.93}, 1e-9),
                          ({"pka1": 3.65, "pka2": 10.07, "ph": 3.65},
                           {"net_charge": 0.5, "fraction_positive": 0.5}, 1e-5)],
    "langmuir-isotherm": [({"qmax": 100, "k": 2, "concentration": 1},
                           {"adsorbed": 66.6667, "coverage": 66.6667, "kc": 2}, 1e-3),
                          ({"qmax": 200, "k": 0.1, "concentration": 10},
                           {"adsorbed": 100.0, "coverage": 50.0}, 1e-9),
                          ({"qmax": 50, "k": 20, "concentration": 5},
                           {"adsorbed": 49.50495, "coverage": 99.0099}, 1e-4)],
    "net-ionic-equation": [({"cation_moles": 0.01, "anion_moles": 0.008, "molar_mass": 143.32},
                            {"precipitate_moles": 0.008, "precipitate_mass": 1.14656,
                             "excess_moles": 0.002}, 1e-6),
                           ({"cation_moles": 0.02, "anion_moles": 0.05, "molar_mass": 100.09},
                            {"precipitate_moles": 0.02, "precipitate_mass": 2.0018}, 1e-6),
                           ({"cation_moles": 0.005, "anion_moles": 0.005, "molar_mass": 233.39},
                            {"precipitate_mass": 1.16695, "excess_moles": 0.0}, 1e-6)],
    "saponification-value": [({"blank_titre": 25.0, "sample_titre": 15.0, "acid_molarity": 0.5,
                               "sample_mass": 2.0},
                              {"saponification_value": 140.25, "koh_consumed": 280.5,
                               "mean_molar_mass": 1200.0}, 1e-6),
                             ({"blank_titre": 25, "sample_titre": 12, "acid_molarity": 0.5,
                               "sample_mass": 2}, {"saponification_value": 182.325}, 1e-5),
                             ({"blank_titre": 25, "sample_titre": 18, "acid_molarity": 0.5,
                               "sample_mass": 2}, {"saponification_value": 98.175}, 1e-5)],
    "crude-protein": [({"nitrogen_percent": 3.2, "factor": 6.25, "sample_mass": 100},
                       {"protein_percent": 20.0, "protein_mass": 20.0, "nitrogen_mass": 3.2}, 1e-9),
                      ({"nitrogen_percent": 5.0, "factor": 5.7, "sample_mass": 100},
                       {"protein_percent": 28.5}, 1e-9),
                      ({"nitrogen_percent": 0.52, "factor": 6.38, "sample_mass": 250},
                       {"protein_percent": 3.3176, "protein_mass": 8.294}, 1e-4)],
    "miller-indices": [({"lattice_parameter": 4.05, "h": 1, "k": 1, "l": 1, "wavelength": 1.5406},
                        {"d_spacing": 2.338269, "two_theta": 38.4686, "index_sum": 1.732051}, 1e-4),
                       ({"lattice_parameter": 4.05, "h": 2, "k": 0, "l": 0, "wavelength": 1.5406},
                        {"d_spacing": 2.025, "two_theta": 44.7163}, 1e-4),
                       ({"lattice_parameter": 3.615, "h": 1, "k": 1, "l": 1, "wavelength": 1.5406},
                        {"d_spacing": 2.087121, "two_theta": 43.3169}, 1e-4)],

    # ---- batch 5c: combustion, process plant and interfaces
    "air-fuel-ratio-afr": [({"air_mass": 14.7, "fuel_mass": 1.0, "stoich_afr": 14.7},
                            {"afr": 14.7, "lambda": 1.0, "excess_air": 0.0}, 1e-9),
                           ({"air_mass": 12.5, "fuel_mass": 1.0, "stoich_afr": 14.7},
                            {"afr": 12.5, "lambda": 0.85034, "excess_air": -14.966}, 1e-4),
                           ({"air_mass": 17.2, "fuel_mass": 1.0, "stoich_afr": 17.2},
                            {"lambda": 1.0, "excess_air": 0.0}, 1e-9)],
    "chemical-equation-balancer": [({"carbon_atoms": 8, "hydrogen_atoms": 18, "oxygen_atoms": 0},
                                    {"o2_coefficient": 12.5, "co2_coefficient": 8.0,
                                     "h2o_coefficient": 9.0, "oxygen_mass": 399.975}, 1e-6),
                                   ({"carbon_atoms": 2, "hydrogen_atoms": 6, "oxygen_atoms": 1},
                                    {"o2_coefficient": 3.0, "co2_coefficient": 2.0,
                                     "h2o_coefficient": 3.0}, 1e-9),
                                   ({"carbon_atoms": 1, "hydrogen_atoms": 4, "oxygen_atoms": 0},
                                    {"o2_coefficient": 2.0, "h2o_coefficient": 2.0}, 1e-9)],
    "chemical-name": [({"cation_charge": 2, "anion_charge": 3, "cation_mass": 40.08,
                        "anion_mass": 14.01},
                       {"cation_count": 3.0, "anion_count": 2.0, "formula_mass": 148.26,
                        "net_charge": 0.0}, 1e-9),
                      ({"cation_charge": 1, "anion_charge": 2, "cation_mass": 22.99,
                        "anion_mass": 96.06}, {"cation_count": 2.0, "anion_count": 1.0,
                                               "formula_mass": 142.04}, 1e-9),
                      ({"cation_charge": 2, "anion_charge": 1, "cation_mass": 40.08,
                        "anion_mass": 35.45}, {"cation_count": 1.0, "anion_count": 2.0,
                                               "formula_mass": 110.98}, 1e-9)],
    "detention-time": [({"volume": 1000, "flow": 5000},
                        {"detention_days": 0.2, "detention_hours": 4.8,
                         "detention_minutes": 288.0}, 1e-9),
                       ({"volume": 250, "flow": 1000}, {"detention_hours": 6.0}, 1e-9),
                       ({"volume": 5000, "flow": 20000}, {"detention_days": 0.25}, 1e-9)],
    "electron-configuration": [({"electrons": 17}, {"shell_1": 2.0, "shell_2": 8.0, "shell_3": 7.0,
                                                    "shell_4": 0.0, "valence_electrons": 7.0}, 1e-9),
                               ({"electrons": 11}, {"shell_3": 1.0, "valence_electrons": 1.0}, 1e-9),
                               ({"electrons": 18}, {"shell_3": 8.0, "valence_electrons": 8.0}, 1e-9),
                               ({"electrons": 20}, {"shell_4": 2.0, "valence_electrons": 2.0}, 1e-9)],
    "hydraulic-retention-time": [({"volume": 2000, "influent_flow": 10000, "recycle_ratio": 0.5},
                                  {"effective_flow": 15000.0, "hrt_hours": 3.2,
                                   "hrt_days": 0.133333}, 1e-6),
                                 ({"volume": 3000, "influent_flow": 12000, "recycle_ratio": 1.0},
                                  {"effective_flow": 24000.0, "hrt_hours": 3.0}, 1e-9),
                                 ({"volume": 4000, "influent_flow": 8000, "recycle_ratio": 0},
                                  {"hrt_hours": 12.0}, 1e-9)],
    "liquid-ethylene-density": [({"temperature": 250, "critical_temperature": 282.35,
                                  "critical_pressure": 5.041, "rackett_z": 0.2727,
                                  "molar_mass": 28.054},
                                 {"molar_volume": 63.080538323367406, "density": 0.444733046762978,
                                  "density_kg_m3": 444.7330467629782, "reduced_temperature": 0.8854258898530192}, 1e-9),
                                ({"temperature": 280, "critical_temperature": 282.35,
                                  "critical_pressure": 5.041, "rackett_z": 0.2727,
                                  "molar_mass": 28.054}, {"density": 0.3075260441467}, 1e-9),
                                ({"temperature": 170, "critical_temperature": 282.35,
                                  "critical_pressure": 5.041, "rackett_z": 0.2727,
                                  "molar_mass": 28.054}, {"density": 0.5996717156610}, 1e-9)],
    "residence-time": [({"length": 25, "diameter": 4.6, "flow": 1.0},
                        {"area": 0.1661902513749, "linear_velocity": 6.0172001168958555,
                         "residence_time": 4.1547562843725, "residence_time_s": 249.28537706235}, 1e-8),
                       ({"length": 15, "diameter": 2.1, "flow": 0.3},
                        {"area": 0.0346360590058275, "linear_velocity": 8.661493501599745,
                         "residence_time": 1.7318029502913737}, 1e-8),
                       ({"length": 25, "diameter": 4.6, "flow": 2.0},
                        {"linear_velocity": 12.03440023379171, "residence_time": 2.07737814218625}, 1e-8)],
    "two-photon-absorption": [({"cross_section": 50, "average_power": 10, "repetition_rate": 80,
                                "pulse_width": 100, "beam_area": 0.3, "wavelength": 800},
                               {"pulse_energy": 0.000125, "peak_power": 1250.0,
                                "intensity": 416.667, "photon_flux": 1.67689573062347e30,
                                "excitation_rate": 11247917.1655329}, 1e-3),
                              ({"cross_section": 10, "average_power": 5, "repetition_rate": 80,
                                "pulse_width": 200, "beam_area": 0.5, "wavelength": 900},
                               {"peak_power": 312.5, "intensity": 62.5,
                                "excitation_rate": 128120.806463648}, 5e-4),
                              ({"cross_section": 100, "average_power": 20, "repetition_rate": 80,
                                "pulse_width": 100, "beam_area": 0.3, "wavelength": 800},
                               {"excitation_rate": 89983337.3242631}, 1e-3)],
    "young-laplace-equation": [({"surface_tension": 72.0, "contact_angle": 0, "radius": 0.5,
                                 "density": 1000},
                                {"capillary_pressure": 288.0, "capillary_rise": 29.3578,
                                 "capillary_rise_cm": 2.93578}, 1e-4),
                               ({"surface_tension": 72.8, "contact_angle": 0, "radius": 0.1,
                                 "density": 998}, {"capillary_pressure": 1456.0,
                                                   "capillary_rise": 148.717}, 1e-2),
                               ({"surface_tension": 72.8, "contact_angle": 120, "radius": 0.5,
                                 "density": 1000}, {"capillary_pressure": -145.6,
                                                    "capillary_rise": -14.8420}, 1e-3),
                               ({"surface_tension": 485, "contact_angle": 140, "radius": 0.2,
                                 "density": 13534}, {"capillary_pressure": -3715.32,
                                                     "capillary_rise": -27.9834}, 1e-2)],
}


class Engine:
    """One PHP process, many requests."""

    def __init__(self) -> None:
        self.proc = subprocess.Popen(
            ["php", os.path.join(os.path.dirname(__file__), "solve_cli.php")],
            stdin=subprocess.PIPE, stdout=subprocess.PIPE, text=True, cwd=SITE)

    def ask(self, path: str, inputs: dict[str, float]) -> dict:
        assert self.proc.stdin and self.proc.stdout
        self.proc.stdin.write(json.dumps({"path": path, "inputs": inputs}) + "\n")
        self.proc.stdin.flush()
        return json.loads(self.proc.stdout.readline())

    def close(self) -> None:
        if self.proc.stdin:
            self.proc.stdin.close()
        self.proc.wait(timeout=20)


def close_enough(a: float | None, b: float | None) -> bool:
    if a is None or b is None:
        return a is b
    if math.isnan(a) or math.isnan(b):
        return False
    scale = max(1.0, abs(a), abs(b))
    return abs(a - b) / scale <= TOL


def check_literature(spec: Spec, engine: Engine) -> list[str]:
    problems: list[str] = []
    for inputs, expected, tol in LITERATURE.get(spec.slug, []):
        got = engine.ask(f"/chemistry/{spec.slug}", inputs)
        if not got.get("ok"):
            problems.append(f"literature: engine refused {inputs}")
            continue
        for key, want in expected.items():
            have = got["values"].get(key)
            if have is None or abs(have - want) > max(tol, abs(want) * 1e-9):
                problems.append(f"literature {inputs}: {key} = {have!r}, expected {want!r}")
    return problems


def check_spec(spec: Spec, engine: Engine, rng: random.Random) -> list[str]:
    problems: list[str] = []
    path = f"/chemistry/{spec.slug}"
    env = spec.default_env()
    numeric = [f for f in spec.fields if f.get("type") not in ("select", "note")]

    # 1. the page's own values
    mine = solve(spec, env)
    got = engine.ask(path, env)
    if not got.get("ok"):
        return [f"engine refused the defaults: {got.get('error')}"]
    for r in spec.results:
        if not close_enough(mine.get(r["name"]), got["values"].get(r["name"])):
            problems.append(f"default: {r['name']} python {mine.get(r['name'])!r} "
                            f"vs php {got['values'].get(r['name'])!r}")

    # 2. random input sets
    for _ in range(200):
        values = {}
        for f in numeric:
            base = env.get(f["name"], 1.0)
            if f.get("_bounds"):
                lo_b, hi_b = f["_bounds"]
                values[f["name"]] = rng.uniform(lo_b, hi_b)
                continue
            if base == 0:
                values[f["name"]] = rng.choice([-1.0, 1.0]) * 10 ** rng.uniform(-1, 1)
                continue
            sign = 1.0 if base > 0 else -1.0
            mag = abs(base)
            values[f["name"]] = sign * math.exp(rng.uniform(math.log(mag / 1000), math.log(mag * 1000)))
        mine = solve(spec, values)
        got = engine.ask(path, values)
        if not got.get("ok"):
            problems.append(f"random: engine refused: {got.get('error')}")
            break
        bad = None
        for r in spec.results:
            if not close_enough(mine.get(r["name"]), got["values"].get(r["name"])):
                bad = (f"random {values}: {r['name']} python {mine.get(r['name'])!r} "
                       f"vs php {got['values'].get(r['name'])!r}")
                break
        if bad:
            problems.append(bad)
            break

    # 3. round trip: leave one input out, give the results, expect that input back
    mine = solve(spec, env)
    formulas = spec.all_formulas()
    for f in numeric:
        key = f["name"]
        if key not in formulas or key in spec.no_round_trip:   # no usable inverse
            continue
        want = env[key]
        inputs = dict(env)
        inputs.pop(key, None)
        inputs.update({r["name"]: mine[r["name"]] for r in spec.results if r["name"] in mine})
        got = engine.ask(path, inputs)
        if not got.get("ok"):
            problems.append(f"round trip {key}: engine refused")
            continue
        back = got["values"].get(key)
        if not close_enough(want, back):
            problems.append(f"round trip {key}: started at {want!r}, came back as {back!r}")

    # 4. degenerate inputs
    for f in numeric:
        inputs = dict(env)
        inputs[f["name"]] = 0.0
        got = engine.ask(path, inputs)
        if got.get("ok"):
            for k, v in got["values"].items():
                if v is not None and (math.isinf(v) or math.isnan(v)):
                    problems.append(f"zero {f['name']}: {k} became {v}")
                    break
    got = engine.ask(path, {})
    if not got.get("ok"):
        problems.append("blank form: engine refused")

    return problems


def main() -> int:
    only = sys.argv[1] if len(sys.argv) > 1 else ""
    specs = build.load_specs(only)
    engine = Engine()
    rng = random.Random(20261023)
    failed = 0
    for spec in specs:
        problems = check_spec(spec, engine, rng) + check_literature(spec, engine)
        if problems:
            failed += 1
            print(f"  ✗ {spec.slug}")
            for p in problems[:6]:
                print(f"      {p}")
        else:
            print(f"  ✓ {spec.slug}")
    engine.close()
    print(f"\n{len(specs) - failed}/{len(specs)} calculators clean")
    return 1 if failed else 0


if __name__ == "__main__":
    raise SystemExit(main())
