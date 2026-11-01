<?php
/**
 * Dog life expectancy — how old the dog is in human terms, and how much is left.
 *
 * This page arrived as an article with no form: the harvest kept four variables
 * (a breed picker and three numbers) and not one of them was ever placed in a
 * group, so the page rendered "nothing to calculate here".
 *
 * The repair builds the form the article describes. Small dogs live longer than
 * giant ones, so the two things that matter are the dog's age and its size:
 *
 *   human age ≈ 15 in the first year, + 9 in the second, then a yearly step that
 *   grows with the size of the breed (a chihuahua ages about 3 years a year, a
 *   Great Dane about 6)
 *
 * Lifespans are the medians published for each size class.
 */
return [
    'hideTexts' => true,
    'remove' => ['breed', 'life_expectancy'],
    'vars' => [
        'dog_age' => ['type' => 'numerical'],
        'breed_size' => ['type' => 'valueSelect'],
        'human_age' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'expected_life' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'years_left' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'life_stage' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'datasets' => [
        'supp-dog-size' => [
            'name' => 'Size of the breed',
            'uiType' => 'DROPDOWN',
            'options' => [
                ['uid' => 'supp-dog-1', 'label' => 'Toy — under 5 kg (Chihuahua, Yorkie)', 'value' => '1'],
                ['uid' => 'supp-dog-2', 'label' => 'Small — 5 to 10 kg (Pug, Beagle)', 'value' => '2'],
                ['uid' => 'supp-dog-3', 'label' => 'Medium — 10 to 25 kg (Border collie, Labrador)', 'value' => '3'],
                ['uid' => 'supp-dog-4', 'label' => 'Large — 25 to 40 kg (German shepherd, Rottweiler)', 'value' => '4'],
                ['uid' => 'supp-dog-5', 'label' => 'Giant — over 40 kg (Great Dane, Mastiff)', 'value' => '5'],
            ],
        ],
    ],
    'groups' => [
        [
            'uid' => 'supp-dog-inputs', 'title' => 'Your dog', 'desc' => '',
            'm' => [
                ['FR1', [[['t' => 'v', 'n' => 'dog_age', 'vt' => 'numerical', 'l' => 'How old is the dog, in years?']]]],
                ['FR1', [[['t' => 'v', 'n' => 'breed_size', 'vt' => 'valueSelect', 'ds' => 'supp-dog-size', 'l' => 'Size of the breed',
                           'opts' => [
                               ['supp-dog-1', 'Toy — under 5 kg (Chihuahua, Yorkie)', '1'],
                               ['supp-dog-2', 'Small — 5 to 10 kg (Pug, Beagle)', '2'],
                               ['supp-dog-3', 'Medium — 10 to 25 kg (Border collie, Labrador)', '3'],
                               ['supp-dog-4', 'Large — 25 to 40 kg (German shepherd, Rottweiler)', '4'],
                               ['supp-dog-5', 'Giant — over 40 kg (Great Dane, Mastiff)', '5'],
                           ]]]]],
            ],
        ],
        [
            'uid' => 'supp-dog-results', 'title' => 'Results', 'desc' => '',
            'm' => [
                ['FR1', [[['t' => 'v', 'n' => 'human_age', 'vt' => 'dependent', 'l' => 'Age in human years']]]],
                ['FR1', [[['t' => 'v', 'n' => 'expected_life', 'vt' => 'dependent', 'l' => 'Typical lifespan for this size (years)']]]],
                ['FR1', [[['t' => 'v', 'n' => 'years_left', 'vt' => 'dependent', 'l' => 'Years likely left']]]],
                ['FR1', [[['t' => 'v', 'n' => 'life_stage', 'vt' => 'dependent', 'l' => 'Life stage (1 puppy, 2 adult, 3 mature, 4 senior)']]]],
            ],
        ],
    ],
    'js' => <<<'JS'
/*
 * Median lifespan and the yearly ageing rate for each size class, in the order
 * the picker lists them. A toy breed lives about 14 years against 8 for a giant,
 * which is why the same calendar age means very different things.
 */
var SIZES = [
  { name: 'toy',    life: 14.0, rate: 3.3, adult: 3.0 },
  { name: 'small',  life: 13.0, rate: 3.8, adult: 4.5 },
  { name: 'medium', life: 12.0, rate: 4.3, adult: 6.5 },
  { name: 'large',  life: 10.0, rate: 5.0, adult: 9.0 },
  { name: 'giant',  life: 8.0,  rate: 6.0, adult: 12.0 }
];

/* the chosen option's position, whether the picker is a select or radios */
function chosenIndex(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) { return sel.selectedIndex; }
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) { return i; }
  }
  return -1;
}

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['dog_age', 'breed_size'], function (ctx, v) {
  var age = num('dog_age');
  /* the client banks the option's number, so the size arrives as 1 to 5 */
  var index = Number(v.breed_size) - 1;
  if (!isFinite(index) || index < 0) { index = chosenIndex('breed_size'); }

  if (age === null) {
    ctx.addUnmetCondition('Enter the dog’s age in years.');
    return;
  }
  if (index < 0) {
    ctx.addUnmetCondition('Choose the size of the breed.');
    return;
  }
  if (age < 0) {
    ctx.addUnmetCondition('An age cannot be negative.');
    return;
  }
  if (age > 30) {
    ctx.addUnmetCondition('No dog has reached ' + snum(age, 0) + ' years — the record is about 30.');
    return;
  }

  var size = SIZES[index] || SIZES[2];

  /* the first two years age fast, then the size decides the yearly step */
  var human;
  if (age <= 1) {
    human = age * 15;
  } else if (age <= 2) {
    human = 15 + (age - 1) * 9;
  } else {
    human = 24 + (age - 2) * size.rate;
  }

  var left = size.life - age;
  var stage = age < (size.adult * 0.6) ? 1
    : age < size.adult ? 2
    : age < size.adult * 1.6 ? 3
    : 4;

  ctx.exportValue('human_age', sround(human, 1));
  ctx.exportValue('expected_life', sround(size.life, 1));
  ctx.exportValue('years_left', sround(Math.max(0, left), 1));
  ctx.exportValue('life_stage', stage);

  var stageName = { 1: 'puppy', 2: 'young adult', 3: 'mature', 4: 'senior' }[stage];

  ctx.addHtml('<p><strong>A ' + snum(age, 1) + '-year-old ' + size.name + ' breed is about '
    + snum(human, 0) + ' in human years — a ' + stageName + '. Its size class usually lives to '
    + snum(size.life, 1) + ', so ' + (left > 0 ? snum(left, 1) + ' years are likely left'
      : 'it has already outlived the typical lifespan for its size') + '.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Calendar age', snum(age, 1) + ' years'],
    ['Size class', size.name],
    ['Human-equivalent age', snum(human, 0) + ' years'],
    ['Typical lifespan for the size', snum(size.life, 1) + ' years'],
    ['Years left', left > 0 ? snum(left, 1) : 'none by the median'],
    ['Life stage', stageName],
    ['Yearly ageing after the second birthday', snum(size.rate, 1) + ' human years per dog year'],
    ['Share of a typical life lived', snum(Math.min(100, age / size.life * 100), 0) + ' %']
  ]));

  /* the same dog at every size, so the effect of the breed is visible */
  var rows = SIZES.map(function (s) {
    var h = age <= 1 ? age * 15 : age <= 2 ? 15 + (age - 1) * 9 : 24 + (age - 2) * s.rate;
    return [s.name + ' breed', snum(h, 0), snum(s.life, 1), snum(Math.max(0, s.life - age), 1)];
  });
  ctx.addHtml('<p>If this dog were another size, at the same age:</p>');
  ctx.addHtml(stable(['Size', 'Human years', 'Typical lifespan', 'Years left'], rows));

  ctx.addHtml('<p class="calc-unmet">The "multiply by seven" rule is wrong in both directions: a '
    + 'one-year-old dog is a young adult, not a seven-year-old child, and the multiplier that fits a '
    + 'poodle badly overshoots for a mastiff. The figures above follow the age curve most veterinarians '
    + 'use — fast in the first two years, then a steady yearly step that depends on size — and the '
    + 'lifespans are the medians for each size class, not promises for an individual dog. Breed matters '
    + 'within a size (a Cavalier King Charles lives far shorter than a Jack Russell of the same weight), '
    + 'and so do body condition, dental care and neutering. A dog that is a mixture of sizes is best '
    + 'placed by its adult weight rather than by the largest breed in its ancestry.</p>');
});
JS,
];
