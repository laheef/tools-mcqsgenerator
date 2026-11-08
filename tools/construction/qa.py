"""
QA for the construction pack.

Every calculator is checked four ways against the site's own engine:

  1. the page's values, compared with an independent Python evaluation;
  2. 200 random input sets, spread over three orders of magnitude either side;
  3. a round trip — each input solved from the results it produces;
  4. degenerate inputs (zeros, blanks) must not produce infinities or fatals;
  5. values worked out by hand from the construction practice, not from the formulas.

    python3 tools/construction/qa.py            # everything written so far
    python3 tools/construction/qa.py mole,ph    # just these
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
    # Worked out by hand from construction practice, not from these formulas.
    "brick": [
        ({'wall_length': 8, 'wall_height': 10, 'brick_length': 7.625, 'brick_height': 2.25, 'joint': 0.375, 'waste': 5},
         {"bricks": 549, "bricks_with_waste": 576}, 0.02),
    ],
    "concrete-slab": [
        ({'length': 10, 'width': 10, 'thickness': 4, 'waste': 0},
         {"volume_ft3": 33.3333, "volume_yd3": 1.2346, "bags_80lb": 56}, 0.02),
    ],
    "concrete-block": [
        ({'wall_length': 20, 'wall_height': 8, 'block_length': 16, 'block_height': 8, 'joint': 0.375, 'waste': 5},
         {"blocks": 169, "blocks_with_waste": 177, "courses": 12}, 0.02),
    ],
    "concrete-block-fill": [
        ({'blocks': 100, 'core_volume': 500, 'waste': 0},
         {"grout_ft3": 28.9352, "grout_yd3": 1.0717, "bags_80lb": 65}, 0.02),
    ],
    "concrete-column": [
        ({'diameter': 12, 'height': 10, 'count': 1, 'waste': 0},
         {"volume_each": 7.854, "volume_total": 0.2909, "bags_80lb": 14, "form_area": 31.4159}, 0.02),
    ],
    "concrete-cylinder": [
        ({'diameter': 6, 'height': 12, 'count': 1, 'density': 150},
         {"volume_each": 0.1963, "weight_each": 29.4524}, 0.02),
    ],
    "concrete-stairs": [
        ({'steps': 5, 'rise': 7, 'run': 10, 'width': 3, 'landing': 0, 'waist': 6, 'waste': 0},
         {"total_rise": 35, "footprint": 12.5, "flight_length": 5.0861, "volume_ft3": 11.2749, "volume_yd3": 0.4176}, 0.02),
    ],
    "concrete-tube": [
        ({'diameter': 8, 'depth': 24, 'count': 1, 'waste': 0},
         {"concrete_each": 0.6981, "bags_80lb": 2}, 0.02),
    ],
    "concrete-weight": [
        ({'volume': 1, 'density': 150},
         {"weight_lb": 4050, "weight_tons": 2.025, "weight_kg": 1837.0491}, 0.02),
    ],
    "cement": [
        ({'volume': 27, 'cement_parts': 1, 'sand_parts': 2, 'aggregate_parts': 3, 'waste': 0},
         {"cement_ft3": 4.5, "sand_ft3": 9.0, "aggregate_ft3": 13.5, "cement_bags": 5}, 0.02),
    ],
    "mortar": [
        ({'wall_area': 100, 'joint': 0.375, 'unit_depth': 8, 'waste': 0},
         {"mortar_ft3": 2.9851, "bags_80lb": 5}, 0.02),
    ],
    "grout": [
        ({'area': 100, 'tile_length': 12, 'tile_width': 12, 'joint_width': 3, 'joint_depth': 8, 'density': 1.6},
         {"joint_length": 200, "grout_litres": 1.463, "grout_kg": 2.3409}, 0.02),
    ],
    "thinset": [
        ({'area': 200, 'coverage': 10, 'coats': 1, 'waste': 5},
         {"bags": 21, "weight": 1050}, 0.02),
    ],
    "rebar": [
        ({'length': 10, 'width': 10, 'spacing': 12, 'bar_size': 4},
         {"bars_length": 11, "bars_width": 11, "total_length": 220, "weight": 146.96}, 0.02),
    ],
    "sonotube": [
        ({'diameter': 10, 'height': 4, 'waste': 0},
         {"volume_ft3": 2.1817, "bags_80lb": 4, "tube_area": 10.472}, 0.02),
    ],
    "post-hole-concrete": [
        ({'hole_diameter': 12, 'hole_depth': 3, 'post_size': 4, 'posts': 1, 'waste': 0},
         {"concrete_each": 2.0229, "post_displacement": 0.3333}, 0.02),
    ],
    "concrete-driveway-cost": [
        ({'length': 20, 'width': 10, 'thickness': 4, 'price': 150, 'labor': 5},
         {"area": 200, "volume_yd3": 2.4691, "concrete_cost": 370.3704, "labor_cost": 1000, "total_cost": 1370.3704, "cost_per_ft2": 6.8519}, 0.02),
    ],
    "gravel": [
        ({'length': 10, 'width': 10, 'depth': 3, 'density': 1.4, 'waste': 0},
         {"area": 100, "volume_ft3": 25, "volume_yd3": 0.9259, "tons": 1.2963}, 0.02),
    ],
    "crushed-stone": [
        ({'length': 10, 'width': 10, 'depth': 4, 'compaction': 20, 'density': 1.4},
         {"area": 100, "compacted_volume": 1.2346, "loose_volume": 1.5432, "tons": 2.1605}, 0.02),
    ],
    "sand": [
        ({'length': 10, 'width': 10, 'depth': 1, 'density': 1.35, 'waste': 0},
         {"volume_ft3": 8.3333, "volume_yd3": 0.3086, "tons": 0.4167, "bags_60lb": 17}, 0.02),
    ],
    "stone": [
        ({'length': 10, 'height': 2, 'thickness': 12, 'density': 1.5, 'waste': 0},
         {"volume_yd3": 0.7407, "tons": 1.1111, "truckloads": 2}, 0.02),
    ],
    "rock": [
        ({'area': 100, 'stone_size': 12, 'depth': 3, 'density': 1.5, 'waste': 0},
         {"stones": 100, "volume_yd3": 0.9259, "tons": 1.3889}, 0.02),
    ],
    "river-rock": [
        ({'length': 10, 'width': 4, 'depth': 3, 'density': 1.3, 'waste': 0},
         {"area": 40, "volume_yd3": 0.3704, "tons": 0.4815, "coverage_per_ton": 83.0769}, 0.02),
    ],
    "pea-gravel": [
        ({'length': 10, 'width': 3, 'depth': 2, 'density': 1.25, 'waste': 0},
         {"area": 30, "volume_yd3": 0.1852, "tons": 0.2315, "bags_50lb": 10}, 0.02),
    ],
    "landscape-rock": [
        ({'area': 100, 'depth': 3, 'density': 1.4, 'price': 50, 'waste': 0},
         {"volume_yd3": 0.9259, "tons": 1.2963, "cost": 64.8148, "cost_per_ft2": 0.6481}, 0.02),
    ],
    "limestone": [
        ({'length': 10, 'width': 10, 'depth': 4, 'density': 1.5, 'price': 40},
         {"volume_yd3": 1.2346, "tons": 1.8519, "cost": 74.0741}, 0.02),
    ],
    "lumber": [
        ({'length': 10, 'width': 4, 'thickness': 2, 'quantity': 5, 'price': 3},
         {"volume_piece": 0.5556, "total_volume": 2.7778, "board_feet": 33.3333, "total_length": 50, "cost": 100}, 0.02),
    ],
    "board-foot": [
        ({'width': 8, 'thickness': 2, 'length': 6, 'pieces': 3, 'price': 5},
         {"board_feet": 24, "volume_ft3": 2.0, "total_length": 18, "cost": 120}, 0.02),
    ],
    "lumber-weight": [
        ({'width': 6, 'thickness': 2, 'length': 8, 'pieces': 4, 'density': 30},
         {"volume_piece": 0.6667, "weight_piece": 20, "weight_total": 80, "weight_kg": 36.2874}, 0.02),
    ],
    "plywood": [
        ({'length': 16, 'width': 10, 'sheet_length': 8, 'sheet_width': 4, 'waste': 0, 'price': 40},
         {"area": 160, "sheets": 5, "waste_area": 0, "cost": 200}, 0.02),
    ],
    "framing": [
        ({'wall_length': 20, 'wall_height': 9, 'spacing': 16, 'openings': 0, 'stud_width': 3.5, 'stud_thickness': 1.5, 'waste': 0},
         {"studs": 16, "plate_length": 60, "stud_linear": 144, "board_feet": 89.25}, 0.02),
    ],
    "floor-joist": [
        ({'length': 20, 'width': 12, 'spacing': 16, 'joist_depth': 9.25, 'joist_width': 1.5, 'waste': 0},
         {"joists": 10, "linear_feet": 200, "board_feet": 231.25, "hangers": 20}, 0.02),
    ],
    "wood-beam-span": [
        ({'width': 3.5, 'depth': 9.25, 'fb': 1000, 'load': 300},
         {"section_modulus": 49.9115, "max_moment": 49911.4583, "max_span": 10.5316}, 0.02),
    ],
    "beam-deflection": [
        ({'span': 12, 'load': 300, 'e': 1600000.0, 'i': 120},
         {"deflection": 0.729, "limit": 0.4, "margin": -0.329}, 0.02),
    ],
    "beam-load": [
        ({'tributary': 10, 'dead': 15, 'live': 40, 'span': 12},
         {"total_psf": 55, "line_load": 550, "total_load": 6600, "reaction": 3300}, 0.02),
    ],
    "roof-truss": [
        ({'roof_length': 30, 'span': 24, 'spacing': 24, 'pitch': 6, 'overhang': 12},
         {"trusses": 16, "rafter_length": 14.5344, "peak_height": 6, "gable_area": 72}, 0.02),
    ],
    "rafter-length": [
        ({'run': 12, 'rise': 6, 'overhang': 18},
         {"rafter": 15.0935, "pitch": 6, "angle": 26.5651, "multiplier": 1.118}, 0.02),
    ],
    "birdsmouth-cut": [
        ({'pitch': 6, 'seat_cut': 3.5, 'rafter_depth': 9.25},
         {"roof_angle": 26.5651, "notch_depth": 1.75, "notch_limit": 2.3125, "remaining_depth": 7.5}, 0.02),
    ],
    "roof-pitch": [
        ({'rise': 6, 'run': 12},
         {"pitch": 6, "angle": 26.5651, "multiplier": 1.118, "rafter": 13.4164}, 0.02),
    ],
    "roof-shingle": [
        ({'length': 30, 'width': 24, 'pitch': 6, 'waste': 10, 'price': 38},
         {"roof_area": 804.9845, "squares": 8.0498, "bundles": 27, "cost": 1026}, 0.02),
    ],
    "roofing": [
        ({'area': 1200, 'waste': 10, 'bundles_per_square': 3, 'roll_coverage': 400, 'price': 38},
         {"area_with_waste": 1320, "squares": 13.2, "bundles": 40, "rolls": 4, "cost": 1520}, 0.02),
    ],
    "gambrel-roof": [
        ({'span': 24, 'lower_pitch': 4, 'upper_pitch': 10, 'length': 30},
         {"total_rise": 7, "lower_area": 379.4733, "upper_area": 468.615, "roof_area": 848.0883}, 0.02),
    ],
    "snow-load": [
        ({'ground': 30, 'exposure': 1.0, 'thermal': 1.1, 'importance': 1.0, 'slope': 30, 'area': 1500},
         {"flat_load": 23.1, "slope_factor": 1.0, "roof_load": 23.1, "total_load": 34650}, 0.02),
    ],
    "door-header-size": [
        ({'opening': 4, 'load': 300, 'fb': 1000, 'width': 3.5},
         {"moment": 7200, "s_required": 7.2, "depth_required": 3.5132}, 0.02),
    ],
    "stairs": [
        ({'total_rise': 108, 'riser': 7.5, 'tread': 10, 'width': 3.5},
         {"risers": 15, "riser_actual": 7.2, "total_run": 11.6667, "stringer": 14.7347, "angle": 37.6476}, 0.02),
    ],
    "spiral-staircase": [
        ({'total_rise': 108, 'riser': 7.5, 'tread_angle': 30, 'outer_radius': 30, 'inner_radius': 6},
         {"treads": 15, "turns": 1.25, "walkline": 11.781, "tread_width": 24}, 0.02),
    ],
    "miter-angle": [
        ({'joint_angle': 90, 'a_width': 3, 'b_width': 5},
         {"angle_a": 30.9638, "angle_b": 59.0362}, 0.02),
    ],
    "angle-cut": [
        ({'rise': 6, 'run': 12},
         {"angle": 26.5651, "mitre": 63.4349, "ratio": 6}, 0.02),
    ],
    "arch": [
        ({'span': 10, 'rise': 2.5},
         {"radius": 6.25, "angle": 106.2602, "arc_length": 11.5912, "area": 17.4725}, 0.02),
    ],
    "shiplap": [
        ({'area': 200, 'board_width': 6, 'overlap': 1, 'board_length': 8, 'waste': 10},
         {"exposed_width": 5, "boards": 66, "linear_feet": 528, "coverage_per_board": 3.3333}, 0.02),
    ],
    "board-and-batten": [
        ({'area': 200, 'board_width': 6, 'batten_width': 2, 'batten_spacing': 16, 'board_length': 8, 'waste': 10},
         {"boards": 55, "battens": 21, "total_linear": 608, "coverage_per_board": 4}, 0.02),
    ],
    "decking": [
        ({'area': 200, 'board_width': 5.5, 'gap': 0.25, 'board_length': 12, 'waste': 10, 'price': 14},
         {"boards": 39, "linear_feet": 468, "coverage_per_board": 5.75, "cost": 546}, 0.02),
    ],

    # Batch 3: worked out independently, from the geometry and the hand tables.
    "cubic-yard": [
        ({'length': 20, 'width': 15, 'depth': 6},
         {"volume_ft3": 150, "volume_yd3": 5.5556, "volume_m3": 4.2475}, 0.02),
    ],
    "ft2-yd3": [
        ({'area': 200, 'depth': 5, 'waste': 0},
         {"volume_ft3": 83.3333, "volume_yd3": 3.0864, "bags_80lb": 139}, 0.02),
    ],
    "hole-volume": [
        ({'diameter': 18, 'depth': 48},
         {"volume_ft3": 7.0686, "volume_yd3": 0.2618, "gallons": 52.877}, 0.02),
    ],
    "tank-volume": [
        ({'length': 5, 'width': 2.5, 'depth': 2},
         {"volume_ft3": 25, "gallons": 187.013, "litres": 707.92}, 0.02),
    ],
    "pool": [
        ({'length': 30, 'width': 15, 'shallow': 3, 'deep': 7},
         {"avg_depth": 5, "volume_ft3": 2250, "gallons": 16831.17}, 0.02),
    ],
    "round-pool-volume": [
        ({'diameter': 24, 'depth': 4.5},
         {"surface_area": 452.3893, "volume_ft3": 2035.75, "gallons": 15228.48}, 0.02),
    ],
    "pond": [
        ({'length': 40, 'width': 25, 'max_depth': 5, 'shape_factor': 0.6},
         {"avg_depth": 3, "volume_ft3": 3000, "gallons": 22441.56, "acre_feet": 0.06887}, 0.02),
    ],
    "pipe-volume": [
        ({'inside_diameter': 3, 'length': 50},
         {"volume_ft3": 2.4544, "gallons": 18.36, "gallons_per_ft": 0.3672}, 0.02),
    ],
    "size-to-weight-rectangular-cuboid": [
        ({'length': 10, 'width': 10, 'height': 10, 'density': 100},
         {"volume_in3": 1000, "volume_ft3": 0.5787, "weight_lb": 57.87, "weight_kg": 26.25}, 0.02),
    ],
    "steel-weight": [
        ({'size': 1.5, 'factor': 1.0, 'length': 10, 'count': 2},
         {"area_in2": 2.25, "weight_each": 76.572, "weight_total": 153.144, "weight_kg": 69.465}, 0.02),
    ],
    "steel-plate-weight": [
        ({'length': 60, 'width': 30, 'thickness': 0.375, 'count': 2},
         {"area_ft2": 12.5, "weight_each": 191.43, "weight_total": 382.86, "psf": 15.3144}, 0.02),
    ],
    "plate-weight": [
        ({'length': 24, 'width': 24, 'thickness': 0.5, 'density': 0.0975},
         {"volume_in3": 288, "weight_lb": 28.08, "weight_kg": 12.737, "psf": 7.02}, 0.02),
    ],
    "metal-weight": [
        ({'size': 1.5, 'factor': 0.866, 'length': 6, 'density': 0.2836},
         {"area_in2": 1.9485, "volume_in3": 11.691, "weight_lb": 3.3157, "weight_kg": 1.504}, 0.02),
    ],
    "aluminum-weight": [
        ({'length': 36, 'width': 12, 'thickness': 0.25, 'count': 4},
         {"volume_in3": 108, "weight_each": 10.53, "weight_total": 42.12, "weight_kg": 19.105}, 0.02),
    ],
    "glass-weight": [
        ({'width': 30, 'height': 60, 'thickness': 0.375, 'count': 2},
         {"area_ft2": 12.5, "weight_each": 62.1, "weight_total": 124.2, "psf": 4.968}, 0.02),
    ],
    "log-weight": [
        ({'diameter': 16, 'length': 12, 'form_factor': 0.65, 'density': 55},
         {"volume_ft3": 10.8909, "weight_lb": 599.0, "weight_kg": 271.7, "tons": 0.2995}, 0.02),
    ],
    "pipe-weight": [
        ({'outside_diameter': 3.5, 'wall': 0.216, 'length': 21},
         {"inside_diameter": 3.068, "weight_per_ft": 7.584, "weight_total": 159.27}, 0.02),
    ],
    "road-base": [
        ({'length': 80, 'width': 12, 'depth': 8, 'compaction': 15, 'density': 110, 'price': 30},
         {"volume_yd3": 27.2593, "tons": 40.48, "tonnes": 36.73, "cost": 1214.4}, 0.02),
    ],
    "rip-rap": [
        ({'velocity': 6, 'isbash': 0.86, 'area': 300, 'thickness': 2, 'density': 160},
         {"rock_in": 9.075, "volume_yd3": 22.2222, "tons": 48}, 0.02),
    ],
    "fire-glass": [
        ({'length': 30, 'width': 18, 'factor': 1.0, 'depth': 2, 'density': 80},
         {"area_ft2": 3.75, "volume_ft3": 0.625, "weight_lb": 50}, 0.02),
    ],
    "round-pen": [
        ({'diameter': 48, 'panel_length': 10, 'price': 200},
         {"circumference": 150.7964, "panels": 16, "actual_area": 1809.557, "cost": 3200}, 0.02),
    ],
    "hoop-house": [
        ({'length': 30, 'width': 14, 'wall_height': 5, 'rise': 5, 'delta_t': 25},
         {"cover_area": 1026.14, "volume_ft3": 3150, "heater_btu": 30784.2}, 0.02),
    ],
    "chicken-coop-size": [
        ({'regular': 12, 'bantam': 4},
         {"birds": 14.68, "coop_area": 58.72, "run_area": 146.8, "coop_m2": 5.4553}, 0.02),
    ],
    "trump": [
        ({'length': 100, 'height': 20, 'panel_length': 25, 'panel_price': 8000, 'concrete_price': 140},
         {"panels": 21120, "wall_area": 10560000, "concrete_yd3": 78222.22, "total_cost": 179911111}, 0.02),
    ],
    "bowl-segment": [
        ({'segments': 10, 'outer_radius': 5, 'ring_width': 1.25, 'thickness': 0.75},
         {"cut_angle": 18, "outer_length": 3.2492, "inner_length": 2.4369, "volume_in3": 2.6654}, 0.02),
    ],
    "sealant": [
        ({'length': 40, 'width': 0.5, 'depth': 0.375, 'tube': 600, 'waste': 10, 'price': 20},
         {"volume_ml": 1474.84, "tubes": 3, "cost": 60}, 0.02),
    ],

    # Batch 4: worked out by hand from the areas and the coverage rules.
    "paint": [
        ({'length': 12, 'width': 10, 'height': 8, 'doors': 2, 'door_area': 21, 'windows': 2,
          'window_area': 15, 'coats': 2, 'coverage': 350, 'price': 40},
         {"wall_area": 352, "net_area": 280, "gallons": 1.6, "cans": 2, "cost": 80}, 0.02),
    ],
    "wallpaper": [
        ({'length': 10, 'width': 8, 'height': 8, 'roll_width': 20.5, 'roll_length': 33, 'repeat': 0,
          'price': 40},
         {"perimeter": 36, "strips": 22, "per_roll": 4, "rolls": 6, "cost": 240}, 0.02),
    ],
    "tile": [
        ({'length': 10, 'width': 10, 'tile_length': 12, 'tile_width': 12, 'gap': 0.125, 'waste': 10,
          'per_box': 10, 'price': 40},
         {"area_ft2": 100, "tile_ft2": 1.0169, "tiles": 108, "boxes": 11, "cost": 440}, 0.02),
    ],
    "carpet": [
        ({'length': 18, 'width': 12, 'waste': 10, 'price': 20},
         {"area_ft2": 216, "area_yd2": 24, "order_yd2": 26.4, "cost": 528}, 0.02),
    ],
    "flooring": [
        ({'length': 12, 'width': 10, 'waste': 10, 'coverage': 20, 'price': 50},
         {"area_ft2": 120, "order_ft2": 132, "boxes": 7, "cost": 350}, 0.02),
    ],
    "stair-carpet": [
        ({'steps': 14, 'riser': 7.5, 'tread': 10, 'nosing': 1, 'width': 3, 'waste': 10, 'price': 4},
         {"per_step": 18.5, "run": 21.5833, "area_ft2": 64.75, "cost": 284.9}, 0.02),
    ],
    "deck-stain": [
        ({'deck_length': 20, 'deck_width': 10, 'rail_length': 50, 'rail_height': 3, 'stair_steps': 4,
          'stair_width': 4, 'rise': 7.5, 'run': 10, 'coats': 2, 'coverage': 250, 'price': 40},
         {"floor_area": 200, "rail_area": 300, "stair_area": 23.3333, "total_area": 523.3333,
          "gallons": 4.1867, "cost": 200}, 0.02),
    ],
    "fence-stain": [
        ({'length': 80, 'height': 6, 'faces': 2, 'coats': 2, 'coverage': 200, 'price': 40},
         {"area_ft2": 960, "gallons": 9.6, "cans": 10, "cost": 400}, 0.02),
    ],
    "epoxy": [
        ({'length': 24, 'width': 20, 'coats': 2, 'coverage': 250, 'waste': 10, 'price': 110},
         {"area_ft2": 480, "coated_ft2": 1056, "kits": 5, "cost": 550}, 0.02),
    ],
    "asphalt": [
        ({'length': 50, 'width': 12, 'depth': 3, 'density': 145, 'waste': 5, 'price': 100},
         {"volume_yd3": 5.8333, "tons": 11.4188, "tonnes": 10.3589, "cost": 1141.88}, 0.02),
    ],
    "paver": [
        ({'length': 10, 'width': 10, 'paver_length': 8, 'paver_width': 4, 'joint': 0.125, 'waste': 10,
          'price': 1.5},
         {"area_ft2": 100, "module_ft2": 0.23275, "pavers": 473, "cost": 709.5}, 0.02),
    ],
    "paver-sand": [
        ({'area': 100, 'depth': 1, 'density': 100, 'waste': 10, 'price': 6},
         {"volume_ft3": 9.1667, "tons": 0.4583, "bags": 19, "cost": 114}, 0.02),
    ],
    "drywall": [
        ({'length': 12, 'width': 10, 'height': 8, 'waste': 10, 'sheet_area': 32, 'price': 15},
         {"area_ft2": 352, "sheets": 13, "mud_lb": 35.2, "tape_ft": 176, "screws": 388, "cost": 195}, 0.02),
    ],
    "siding": [
        ({'wall_length': 40, 'height': 9, 'gable_rise': 0, 'doors': 1, 'door_area': 21, 'windows': 4,
          'window_area': 15, 'waste': 10, 'price': 300},
         {"wall_area": 360, "net_area": 279, "squares": 3.069, "cost": 920.7}, 0.02),
    ],
    "vinyl-siding": [
        ({'wall_length': 40, 'height': 9, 'openings': 60, 'panel_length': 12, 'panel_width': 8,
          'waste': 10, 'panel_price': 14, 'trim_price': 2.5},
         {"area_ft2": 360, "panel_area": 8, "panels": 50, "trim_ft": 158, "cost": 1095}, 0.02),
    ],
    "wainscoting": [
        ({'wall_length': 12, 'panels': 4, 'stile': 4, 'end_margin': 4, 'rail_height': 36,
          'base_height': 5, 'rail_width': 3},
         {"panel_width": 31, "panel_height": 25, "panel_area": 21.5278, "stile_run": 1.6667}, 0.02),
    ],
    "square-footage": [
        ({'length': 14, 'width': 11, 'quantity': 3, 'price': 5},
         {"area_ft2": 462, "area_yd2": 51.3333, "area_m2": 42.9212, "cost": 2310}, 0.02),
    ],
    "wall-square-footage": [
        ({'length': 14, 'width': 12, 'height': 9, 'doors': 2, 'door_area': 21, 'windows': 3,
          'window_area': 15},
         {"perimeter": 52, "gross_area": 468, "openings": 87, "net_area": 381}, 0.02),
    ],
    "square-meter": [
        ({'length': 6, 'width': 4, 'shape_factor': 1, 'price': 25},
         {"area_m2": 24, "area_ft2": 258.3336, "perimeter": 20, "cost": 600}, 0.02),
    ],
    "square-yard": [
        ({'length': 18, 'width': 12, 'price': 25},
         {"area_yd2": 24, "area_ft2": 216, "perimeter": 60, "cost": 600}, 0.02),
    ],
    "square-yards": [
        ({'square_feet': 300, 'price': 20, 'waste': 10},
         {"square_yards": 33.3333, "square_meters": 27.8709, "order_yards": 36.6667, "cost": 733.33}, 0.02),
    ],
    "floor-area-ratio": [
        ({'plot_area': 10000, 'footprint': 2500, 'floors': 3, 'setback_area': 5000},
         {"total_floor": 7500, "far": 0.75, "coverage": 0.25, "open_ratio": 0.5}, 0.02),
    ],
    "metal-roof-cost": [
        ({'length': 40, 'width': 24, 'pitch': 6, 'panel_width': 36, 'panel_length': 12, 'waste': 10,
          'price': 90},
         {"pitch_factor": 1.118, "roof_area": 1073.3126, "panels": 33, "cost": 2970}, 0.02),
    ],
    "diy-shed-cost": [
        ({'width': 10, 'length': 12, 'wall_height': 7, 'roof_rise': 2, 'overhang': 1, 'slab_price': 8,
          'wall_price': 12, 'roof_price': 6},
         {"floor_area": 120, "wall_area": 308, "roof_area": 187.8297, "total_cost": 5782.978}, 0.02),
    ],
    "insulation": [
        ({'area': 1000, 'thickness': 12, 'r_per_inch': 3.7, 'bag_coverage': 40, 'price': 18},
         {"r_value": 44.4, "volume_ft3": 1000, "bags": 25, "cost": 450}, 0.02),
    ],
    "gallons-per-square-foot": [
        ({'length': 10, 'width': 10, 'depth': 12},
         {"area_ft2": 100, "volume_ft3": 100, "gallons": 748.052, "gallons_per_ft2": 7.48052}, 0.02),
    ],

    # Batch 5a: counted by hand from the run and the spacing rules.
    "fence": [
        ({'length': 60, 'height': 6, 'post_spacing': 8, 'rail_count': 3, 'picket_width': 5.5,
          'picket_gap': 0.25, 'post_price': 12, 'picket_price': 2.5},
         {"posts": 9, "sections": 8, "rail_ft": 192, "pickets": 127, "cost": 425.5}, 0.02),
    ],
    "fence-cost": [
        ({'length': 150, 'price_per_ft': 24, 'labour_per_ft': 10, 'gates': 2, 'gate_price': 300},
         {"material": 3600, "labour": 1500, "gates_cost": 600, "total": 5700}, 0.02),
    ],
    "fence-estimate": [
        ({'length': 100, 'post_spacing': 8, 'hole_diameter': 12, 'hole_depth': 36,
          'rails_per_section': 2, 'screws_per_rail': 4},
         {"posts": 14, "sections": 13, "concrete_ft3": 32.9867, "bags": 55, "screws": 208}, 0.02),
    ],
    "fence-material": [
        ({'length': 120, 'height': 6, 'post_spacing': 8, 'rail_count': 2, 'board_width': 5.5,
          'board_gap': 0.5, 'board_thickness': 1},
         {"boards": 241, "posts": 16, "rail_ft": 240, "board_feet": 662.75}, 0.02),
    ],
    "fence-picket": [
        ({'length': 75, 'picket_width': 3.5, 'gap': 1.5, 'price': 1.75},
         {"pickets": 181, "exposure": 5, "coverage": 70, "cost": 316.75}, 0.02),
    ],
    "fence-perimeter": [
        ({'length': 80, 'width': 50, 'gate_width': 10, 'post_spacing': 8, 'price': 25},
         {"perimeter": 260, "fence_run": 250, "posts": 33, "panels": 32, "cost": 6250}, 0.02),
    ],
    "fence-post-depth": [
        ({'above_grade': 6, 'frost_depth': 24, 'embed_ratio': 0.33, 'hole_diameter': 8,
          'gravel_base': 6},
         {"below_grade": 24, "post_length": 96, "hole_depth": 30, "concrete_ft3": 0.8727,
          "bags": 2}, 0.02),
    ],
    "privacy-fence": [
        ({'length': 60, 'height': 6, 'board_width': 5.5, 'overlap': 1, 'price': 3.5},
         {"boards": 161, "exposure": 4.5, "coverage": 122.2222, "board_feet": 442.75,
          "cost": 563.5}, 0.02),
    ],
    "vinyl-fence": [
        ({'length': 90, 'height': 6, 'panel_width': 6, 'panel_price': 55, 'post_price': 30},
         {"panels": 15, "posts": 16, "rails": 30, "cost": 1305}, 0.02),
    ],
    "vinyl-fence-cost": [
        ({'length': 120, 'section_price': 70, 'post_price': 28, 'gates': 1, 'gate_price': 400,
          'labour_per_ft': 9},
         {"sections": 15, "posts": 16, "material": 1898, "labour": 1080, "total": 2978}, 0.02),
    ],
    "wood-fence": [
        ({'length': 80, 'height': 6, 'post_spacing': 8, 'rail_count': 2, 'picket_width': 5.5,
          'picket_gap': 0.25, 'lumber_price': 0.9, 'post_price': 15, 'concrete_price': 6},
         {"sections": 10, "pickets": 168, "posts": 11, "board_feet": 508.6667, "cost": 688.8}, 0.02),
    ],
    "board-on-board-fence": [
        ({'length': 100, 'height': 6, 'board_width': 5.5, 'lap': 1.5, 'price': 3.4},
         {"boards": 600, "exposure": 4, "board_feet": 1650, "cost": 2040}, 0.02),
    ],

    # Batch 5b/5c: worked by hand from the geometry, not from the expressions.
    "elevation-grade": [
        ({'start_elevation': 100, 'run': 150, 'grade': 3, 'station': 60},
         {"rise": 4.5, "end_elevation": 104.5, "station_elevation": 101.8,
          "slope_ratio": 33.3333}, 0.02),
    ],
    "ramp-slope": [
        ({'rise': 30, 'slope_ratio': 12, 'width': 5},
         {"run_ft": 30, "length_ft": 30.1042, "slope_pct": 8.3333, "deck_ft2": 150.521}, 0.02),
    ],
    "retaining-wall": [
        ({'length': 24, 'height': 2.5, 'block_length': 12, 'block_height': 6, 'price': 3.5,
          'cap_price': 7},
         {"wall_area": 60, "courses": 5, "blocks": 120, "cap_ft": 24, "cost": 588}, 0.02),
    ],
    "gravel-driveway": [
        ({'length': 60, 'width': 10, 'depth': 3, 'density': 115, 'waste': 10, 'price': 40},
         {"volume_yd3": 6.1111, "tons": 9.4875, "tonnes": 8.6068, "cost": 379.5}, 0.02),
    ],
    "french-drain": [
        ({'length': 80, 'trench_width': 18, 'trench_depth': 24, 'density': 105,
          'gravel_price': 50, 'pipe_price': 2, 'fabric_price': 0.5},
         {"trench_ft3": 240, "gravel_tons": 12.6, "pipe_ft": 80, "fabric_ft2": 440,
          "cost": 1010}, 0.02),
    ],
    "ladder-angle": [
        ({'height': 15, 'base': 3.75},
         {"angle": 75.9638, "ladder_length": 15.4617, "ratio": 4, "safe_base": 3.75}, 0.02),
    ],
    "vertical-curve": [
        ({'g1': 3, 'g2': -2, 'length': 400},
         {"a_rate": -5, "k_value": 80, "turning_station": 240, "mid_offset": 2.5}, 0.02),
    ],
    "angle-of-depression": [
        ({'height': 25, 'distance': 40},
         {"angle": 32.0054, "slope_pct": 62.5, "line_of_sight": 47.1699,
          "horizon_ratio": 62.5}, 0.02),
    ],
    "baluster": [
        ({'run': 100, 'baluster_width': 2, 'max_gap': 4},
         {"balusters": 16, "gap": 4, "spacing": 6, "coverage": 32}, 0.02),
    ],
    "spindle-spacing": [
        ({'run': 144, 'spacing': 5, 'margin': 2.5},
         {"spaces": 27, "marks": 26, "actual_spacing": 5.1481, "leftover": 4}, 0.02),
    ],
    "sag": [
        ({'span': 40, 'weight': 0.4, 'tension': 500},
         {"sag": 0.16, "sag_pct": 0.4, "cable_length": 40.0017}, 0.02),
    ],
    "rolling-offset": [
        ({'offset': 10, 'angle': 60},
         {"travel": 11.547, "run": 5.7735, "travel_ft": 0.96225, "fitting_ratio": 1.1547}, 0.02),
    ],
    "bolt-circle": [
        ({'diameter': 10, 'holes': 6, 'start_angle': 30},
         {"radius": 5, "chord": 5, "arc_spacing": 5.236, "x_first": 4.3301, "y_first": 2.5}, 0.02),
    ],
    "box-fill": [
        ({'box_volume': 20, 'conductors': 7, 'conductor_volume': 2.25, 'devices': 1, 'clamps': 1,
          'grounds': 1},
         {"fill_volume": 24.75, "fill_pct": 123.75, "spare_volume": -4.75, "unit_count": 11}, 0.02),
    ],
    "clearance-hole": [
        ({'bolt_diameter': 0.625, 'clearance': 0.0625, 'thickness': 0.75},
         {"hole_diameter": 0.6875, "edge_distance": 0.9375, "hole_area": 0.3712,
          "grip_ratio": 1.2}, 0.02),
    ],

    # Batch 6: worked with plain arithmetic, step by step, not from the expressions.
    "ac-tonnage": [
        ({'length': 20, 'width': 15, 'btu_per_ft2': 25, 'safety': 10, 'price_per_ton': 1200},
         {"area_ft2": 300, "btu": 8250, "tons": 0.6875, "cost": 825}, 0.02),
    ],
    "air-changes-per-hour": [
        ({'length': 15, 'width': 12, 'height': 8, 'cfm': 200},
         {"volume_ft3": 1440, "air_per_hour": 12000, "ach": 8.3333, "minutes_per_change": 7.2}, 0.02),
    ],
    "air-conditioner-room-size": [
        ({'tons': 1.5, 'btu_per_ft2': 25, 'safety': 10},
         {"btu": 18000, "area_ft2": 654.5455, "area_m2": 60.8094, "kw": 5.2753}, 0.02),
    ],
    "boiler-size": [
        ({'heated_area': 2000, 'btu_per_ft2': 40, 'efficiency': 85},
         {"load_btu": 80000, "output_btu": 94117.6471, "load_kw": 23.4452,
          "output_kw": 27.5826}, 0.02),
    ],
    "cfm": [
        ({'duct_width': 12, 'duct_height': 8, 'velocity': 800},
         {"area_ft2": 0.6667, "cfm": 533.3333, "m3h": 906.1387, "velocity_fps": 13.3333}, 0.02),
    ],
    "fire-flow": [
        ({'coefficient': 0.9, 'nozzle_diameter': 2.5, 'pressure': 50},
         {"gpm": 1186.4906, "lpm": 4491.317, "flow_per_psi": 11.806, "nozzle_area": 4.9087}, 0.02),
    ],
    "furnace-size": [
        ({'cfm': 1200, 'temp_rise': 40, 'efficiency': 80},
         {"output_btu": 51840, "input_btu": 64800, "output_kw": 15.1934,
          "cfm_per_ton": 277.7778}, 0.02),
    ],
    "gallons-per-minute": [
        ({'gallons': 500, 'minutes': 20},
         {"gpm": 25, "lpm": 94.6353, "lps": 1.5773, "gallons_per_hour": 1500}, 0.02),
    ],
    "heat-loss": [
        ({'area': 2000, 'u_value': 0.1, 'delta_t': 50},
         {"loss_btu": 10000, "loss_kw": 2.9307, "loss_per_ft2": 5, "r_value": 10}, 0.02),
    ],
    "junction-box-sizing": [
        ({'conductors': 8, 'devices': 1, 'clamps': 1, 'grounds': 1, 'conductor_volume': 2.25},
         {"unit_count": 12, "required_volume": 27, "min_box": 30, "units_left": 13.3333}, 0.02),
    ],
    "liters-per-minute": [
        ({'liters': 200, 'seconds': 60},
         {"lpm": 200, "lps": 3.3333, "gpm": 52.8343, "m3h": 12}, 0.02),
    ],
    "tonnage": [
        ({'btu': 36000},
         {"tons": 3, "kw": 10.5513, "hp": 14.1487, "btu_per_ton": 12000}, 0.02),
    ],
    "bending-stress": [
        ({'moment': 12000, 'c': 2, 'inertia': 10},
         {"stress": 2400, "stress_mpa": 16.5474, "section_modulus": 5, "stress_ksi": 2.4}, 0.02),
    ],
    "bolt-torque": [
        ({'force': 8000, 'diameter': 0.5, 'k_factor': 0.2},
         {"torque_ftlb": 66.6667, "torque_nm": 90.388, "stress_psi": 40743.7,
          "torque_inlb": 800}, 0.02),
    ],
    "carbon-equivalent": [
        ({'carbon': 0.2, 'manganese': 1.0, 'chromium': 0.1, 'molybdenum': 0, 'vanadium': 0,
          'nickel': 0.1, 'copper': 0.1},
         {"ce": 0.4, "alloy_effect": 0.2, "margin": 0, "preheat": 0}, 0.02),
    ],
    "countersink-depth": [
        ({'head_diameter': 0.4, 'shaft_diameter': 0.16, 'angle': 82},
         {"depth": 0.138, "depth_mm": 3.5063, "radius_diff": 0.12, "cone_volume": 0.0021}, 0.02),
    ],
    "k-factor": [
        ({'angle': 90, 'inside_radius': 0.125, 'thickness': 0.05, 'k_factor': 0.44},
         {"bend_allowance": 0.2309, "neutral_radius": 0.147, "setback": 0.175,
          "bend_deduction": 0.1191}, 0.02),
    ],
    "material-removal-rate": [
        ({'width_cut': 0.5, 'depth_cut': 0.1, 'feed_rate': 20},
         {"mrr": 1, "mrr_cm3": 16.3871, "mrr_hour": 60, "time_per_in3": 1}, 0.02),
    ],
    "pitch-diameter": [
        ({'major_diameter': 0.5, 'tpi': 13},
         {"pitch": 0.076923, "pitch_diameter": 0.450037, "minor_diameter": 0.405623,
          "thread_height": 0.047187}, 0.02),
    ],
    "punch-force": [
        ({'diameter': 0.5, 'thickness': 0.125, 'shear_strength': 50000},
         {"force_lb": 9817.477, "force_tons": 4.9087, "force_kn": 43.6705,
          "shear_area": 0.19635}, 0.02),
    ],
    "rivet-size": [
        ({'thickness': 0.125, 'rivet_factor': 1.2},
         {"rivet_diameter": 0.424264, "edge_distance": 0.848528, "pitch": 1.272793,
          "rivets_per_ft": 10.4281}, 0.02),
    ],
    "spindle-speed": [
        ({'sfm': 300, 'diameter': 0.5},
         {"rpm": 2291.831, "surface_m_min": 91.44, "rpm_per_sfm": 7.6394}, 0.02),
    ],
    "taper": [
        ({'large_diameter': 1.0, 'small_diameter': 0.8, 'length': 4},
         {"taper_per_inch": 0.05, "taper_per_ft": 0.6, "half_angle": 1.4321,
          "included_angle": 2.8642}, 0.02),
    ],
    "thread": [
        ({'major_diameter': 0.5, 'tpi': 13},
         {"pitch": 0.076923, "minor_diameter": 0.405623, "tap_drill": 0.423077}, 0.02),
    ],
    "thread-pitch": [
        ({'pitch_mm': 1.5},
         {"tpi": 16.9333, "pitch_in": 0.059055, "pitch_um": 1500, "threads_per_cm": 6.6667}, 0.02),
    ],
    "true-position": [
        ({'deviation_x': 0.01, 'deviation_y': 0.005},
         {"true_position": 0.0223607, "true_position_mm": 0.56796, "radius": 0.0111803,
          "zone_area": 0.0003927}, 0.02),
    ],
    "welding": [
        ({'leg': 0.25, 'length': 100, 'efficiency': 65, 'price': 4},
         {"throat": 0.176775, "volume": 3.125, "weight": 0.88625, "electrode": 1.36346,
          "cost": 5.45385}, 0.02),
    ],
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
        got = engine.ask(f"/construction/{spec.slug}", inputs)
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
    path = f"/construction/{spec.slug}"
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
