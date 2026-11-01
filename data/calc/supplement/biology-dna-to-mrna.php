<?php
/**
 * DNA to mRNA — transcription and translation.
 *
 * The page's own script does the work correctly and publishes six strings:
 * the DNA in codon-sized groups, its mRNA transcript, and the protein the
 * mRNA codes for — in both directions. None of the six names is declared, so
 * every answer was computed and dropped; and both sequence boxes were typed
 * as numbers, so a strand could not be typed into either of them.
 *
 * The repair declares the six rows and makes both boxes text boxes. The
 * transcription, translation and codon table are the page's own.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'input_DNA_strand'  => ['type' => 'text'],
        'input_mRNA_strand' => ['type' => 'text'],
    ],
    'outputs' => [
        'dna_out_1'     => ['label' => 'DNA, in codons'],
        'mrna_out_1'    => ['label' => 'Messenger RNA transcript'],
        'protein_out_1' => ['label' => 'Protein'],
        'dna_out_2'     => ['label' => 'DNA from your messenger RNA'],
        'mrna_out_2'    => ['label' => 'Messenger RNA you entered'],
        'protein_out_2' => ['label' => 'Protein from that mRNA'],
    ],
    'js' => <<<'JS'
var CODON_TABLE = {
  UUU: 'Phe', UUC: 'Phe', UUA: 'Leu', UUG: 'Leu', CUU: 'Leu', CUC: 'Leu', CUA: 'Leu', CUG: 'Leu',
  AUU: 'Ile', AUC: 'Ile', AUA: 'Ile', AUG: 'Met', GUU: 'Val', GUC: 'Val', GUA: 'Val', GUG: 'Val',
  UCU: 'Ser', UCC: 'Ser', UCA: 'Ser', UCG: 'Ser', CCU: 'Pro', CCC: 'Pro', CCA: 'Pro', CCG: 'Pro',
  ACU: 'Thr', ACC: 'Thr', ACA: 'Thr', ACG: 'Thr', GCU: 'Ala', GCC: 'Ala', GCA: 'Ala', GCG: 'Ala',
  UAU: 'Tyr', UAC: 'Tyr', UAA: 'Stop', UAG: 'Stop', CAU: 'His', CAC: 'His', CAA: 'Gln', CAG: 'Gln',
  AAU: 'Asn', AAC: 'Asn', AAA: 'Lys', AAG: 'Lys', GAU: 'Asp', GAC: 'Asp', GAA: 'Glu', GAG: 'Glu',
  UGU: 'Cys', UGC: 'Cys', UGA: 'Stop', UGG: 'Trp', CGU: 'Arg', CGC: 'Arg', CGA: 'Arg', CGG: 'Arg',
  AGU: 'Ser', AGC: 'Ser', AGA: 'Arg', AGG: 'Arg', GGU: 'Gly', GGC: 'Gly', GGA: 'Gly', GGG: 'Gly'
};

function dmBox(name) {
  var el = document.querySelector('.calc-widget textarea[data-var="' + name + '"], '
    + '.calc-widget input[data-var="' + name + '"]');
  return el ? String(el.value) : '';
}

function dmGroup(seq) {
  return String(seq).replace(/(.{3})/g, '$1 ').trim();
}

omni.onResult([], function (ctx, values) {
  var dna = dmBox('input_DNA_strand').toUpperCase().replace(/\s/g, '');
  var rna = dmBox('input_mRNA_strand').toUpperCase().replace(/\s/g, '');
  var dnaBad = dna.replace(/[ACGT]/g, '').length;
  var rnaBad = rna.replace(/[ACGU]/g, '').length;
  dna = dna.replace(/[^ACGT]/g, '');
  rna = rna.replace(/[^ACGU]/g, '');

  if (!dna && !rna) {
    ctx.addUnmetCondition('Type a DNA strand (A, C, G, T) or an mRNA strand (A, C, G, U).');
    return;
  }
  if ((dnaBad && !dna) || (rnaBad && !rna)) {
    ctx.addUnmetCondition('That is not a nucleotide sequence — DNA uses A, C, G and T, mRNA uses A, C, G and U.');
    return;
  }

  if (dna) {
    /* the strand typed in is read as the coding strand: transcription copies it
       with every T turned into U, so ATG still opens the protein at Met */
    var mrna = dna.replace(/T/g, 'U');
    ctx.exportValue('dna_out_1', dmGroup(dna));
    ctx.exportValue('mrna_out_1', dmGroup(mrna));
    ctx.exportValue('protein_out_1', dmProtein(mrna));
    dmReport(ctx, 'DNA', dna, mrna, '1');
  }
  if (rna) {
    var dna2 = rna.replace(/U/g, 'T');
    ctx.exportValue('dna_out_2', dmGroup(dna2));
    ctx.exportValue('mrna_out_2', dmGroup(rna));
    ctx.exportValue('protein_out_2', dmProtein(rna));
    if (!dna) { dmReport(ctx, 'mRNA', dna2, rna, '2'); }
  }
  if (dnaBad || rnaBad) {
    ctx.addHtml('<p class="calc-note">' + (dnaBad + rnaBad) + ' character(s) were not a nucleotide and were '
      + 'left out of the calculation.</p>');
  }
});

function dmProtein(mrna) {
  var out = [];
  for (var i = 0; i + 3 <= mrna.length; i += 3) {
    var aa = CODON_TABLE[mrna.substr(i, 3)];
    if (!aa) { out.push('?'); continue; }
    if (aa === 'Stop') { out.push('Stop'); break; }
    out.push(aa);
  }
  return out.length ? out.join('-') : 'no complete codon';
}

function dmReport(ctx, which, dna, mrna, n) {
  var protein = dmProtein(mrna);
  var codons = Math.floor(mrna.length / 3);
  ctx.addHtml('<p><strong>' + codons + ' codon' + (codons === 1 ? '' : 's') + ' from ' + mrna.length
    + ' nucleotides: ' + sesc(protein) + '</strong></p>');
  ctx.addHtml(stable(['Step', 'Result'], [
    ['Template DNA', dmGroup(dna)],
    ['mRNA (transcription)', dmGroup(mrna)],
    ['Reading frame', 'starts at the first base' + (mrna.substr(0, 3) === 'AUG' ? ', an AUG start codon' : '')],
    ['Protein (translation)', protein]
  ]));
  ctx.addHtml('<p class="calc-note">Transcription copies the coding strand into mRNA, swapping T for U; '
    + 'translation then reads the mRNA three bases at a time, because three bases carry the sixteen possible '
    + 'choices that a four-letter alphabet needs to name twenty amino acids. AUG is the usual start and also '
    + 'codes methionine; UAA, UAG and UGA stop the chain and are not turned into an amino acid. The strand you '
    + 'type is taken as the coding strand — the one the mRNA matches — so ATG opens at methionine. A laboratory '
    + 'sequence is often the template strand instead, in which case the mRNA is its complement (A to U, T to A, '
    + 'C to G, G to C); paste that complement here and the protein will be right. Only the first reading frame '
    + 'is read: a real gene needs its frame chosen, and one strand of DNA holds six frames.</p>');
}
JS,
];
