/*!
 * FE-Library Javascript and Jquery by Felipe Sales v2.0.0 (https://www.felipesales.com.br)
 * Copyright 2020 The FE-Library Authors
 * Copyright 2020 FE, Inc.
 * Licensed under MIT
 */

// console.log() custom
const l = _ => console.log(_);

// submit blocks button type submit to avoid duplication
$(document).on('submit', 'form', function () {
    $(this.querySelector('button[type="submit"]')).attr('disabled', 'disabled');
});

// submit blocks a type submit to avoid duplication
$(document).on('submit', 'form', function () {
    $(this.querySelector('a[type="submit"]')).attr('disabled', 'disabled');
});

// ajax token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// ajax remove validation
function removeValidate() {
    $('span').removeClass('is-invalid').removeClass('is-valid');
    $('input').removeClass('is-invalid').removeClass('is-valid');
    $('textarea').removeClass('is-invalid').removeClass('is-valid');
    $('.invalid-feedback').remove();
}

// ajax server validation
function serverValidate(data) {
    if (data.status === 422) {
        $.each(data.responseJSON.errors, function (i, error) {
            i = i.replace(/_/g, '-');
            let el = $('.validate-' + i);

            $('.validate-' + i + ' ' + '.input-group-text').removeClass('is-valid').addClass('is-invalid');
            $('[aria-labelledby="select2-' + i + '-container"]').addClass('is-invalid');
            $('#' + i).removeClass('is-valid').addClass('is-invalid');
            el.after($('<div id="' + i + '-error" class="invalid-feedback">' + error[0] + '</div>'));
        });
    }
}

// identifies if access comes from PC or mobile
if (navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad|android)/)) {
    // mobile
    // ignore not to hit the mobile keyboard
    function firstLetterUppercase() {}

    // ignore not to hit the mobile keyboard
    function letterUppercase() {}
} else {
    // PC
    // first letter uppercase - onkeyup="firstLetterUppercase(this);"
    function firstLetterUppercase(letter) {
        let text     = letter.value;
        let quantity = letter.value.length;
        let first    = text.substr(0, 1);
        let rest     = text.substr(1, quantity);

        letter.value = first.toUpperCase() + rest;
    }

    // all first letter uppercase - onkeyup="letterUppercase('id');"
    function letterUppercase(letter) {
        // list of words to ignore
        let ignore = [
            'de', 'do', 'dos', 'das', 'a', 'e', 'i',
            'o', 'u', 'é', 'ou', 'ao', 'em', 'da',
        ], minLength = 2;

        let catchWord = function (str) {
            return str.match(/\S+\s*/g);
        };

        $('#' + letter).each(function () {
            let words = catchWord(this.value);

            if (this.value.length > 0) {
                $.each(words, function (i, word) {
                    // only continues if words are not in the ignore list
                    if (ignore.indexOf($.trim(word)) === -1 && $.trim(word).length > minLength) {
                        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                    } else {
                        words[i] = words[i].toLowerCase();
                    }
                });
                this.value = words.join('');
            }
        });
    }
}

// only allow letters and accents from A to Z + space - onkeypress="return onlyLetters(event);"
function onlyLetters(event) {
    let code;

    if (event.keyCode) {
        code = event.keyCode;
    } else {
        code = event.charCode;
    }

    let validate  = 'abcdefghijlmnopqrstuvxzwykABCDEFGHIJLMNOPQRSTUVXZWYKÁÉÍÓÚáéíóúÂÊÔâêôÀàÇçÃÕãõ ';
    let character = String.fromCharCode(code);

    if (validate.indexOf(character) > -1) {
        return true;
    }

    return validate.indexOf(character) > -1 || code < 9;
}

// prevents line break in textarea
$('textarea').on('keypress', function (event) {
    let enter = 13;
    let char  = event.which || event.keyCode;

    if (char === enter) {
        event.preventDefault();
    }
});

// go back to previous screen - onclick="back();"
function back() {
    window.history.back();
}

// force validation recaptcha
$('#button-send-contact').on('click', function () {
    if ($('.input-group').hasClass('fe-recaptcha')) {
        if (grecaptcha.getResponse() === '' && !$('#form-contact').valid()) {
            $('#g-recaptcha-error').html('<span class="invalid-feedback" role="alert">Por favor, verifique se você não é um robô.</span>');
        } else {
            $('#g-recaptcha-error').html('');
        }
    }
});

// active navbar
$(document).ready(function () {
    $('#menu a[href]').each(function() {
        let href = $(this).attr('href');

        if (href === location.href.split("?")[0]) {
            $(this).parent().addClass('active');
        }
    });
});

// house card listing event
$('#card-module').on('click', function () {
    $(this).addClass('active');
    sessionStorage.setItem('houses.card', 0);
    $('#card-list').removeClass('active');
    $('#card-house-module').removeClass('d-none');
    $('#card-house-list').addClass('d-none');
});

$('#card-list').on('click', function () {
    $(this).addClass('active');
    sessionStorage.setItem('houses.card', 1);
    $('#card-module').removeClass('active');
    $('#card-house-list').removeClass('d-none');
    $('#card-house-module').addClass('d-none');
});

if (sessionStorage.getItem('houses.card') === '1') {
    $('#card-list').addClass('active');
    $('#card-module').removeClass('active');
    $('#card-house-list').removeClass('d-none');
    $('#card-house-module').addClass('d-none');
} else {
    $('#card-module').addClass('active');
    $('#card-list').removeClass('active');
    $('#card-house-module').removeClass('d-none');
    $('#card-house-list').addClass('d-none');
}

// JQuery Mask masks for the system
$(function () {
    // mask for phone and cellphone
    let maskPhones = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }, mask = {
        onKeyPress: function(val, e, field, options) {
            field.mask(maskPhones.apply({}, arguments), options);
        }
    };

    // mask
    $('.mask-date').mask('00/00/0000');
    $('.mask-time').mask('00:00');
    $('.mask-date-time').mask('00/00/0000 00:00:00');
    $('.mask-cep').mask('00000-000');
    $('.mask-phone').mask('0000-0000');
    $('.mask-cell-phone').mask('00000-0000');
    $('.mask-phone-ddd').mask('(00) 0000-0000');
    $('.mask-cell-phone-ddd').mask('(00) 00000-0000');
    $('.mask-phones').mask(maskPhones, mask);
    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
    $('.mask-cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
    $('.mask-money-2').mask('#.##0,00', {reverse: true});
    $('.mask-ip-address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.mask-ip-address').mask('099.099.099.099');
    $('.mask-percent').mask('##0,00%', {reverse: true});
    $('.mask-date-clear-if-not-match').mask('00/00/0000', {clearIfNotMatch: true});
    $('.mask-date-placeholder').mask('00/00/0000', {placeholder: '__/__/____'});
    $('.mask-fallback').mask('00r00r0000', {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: '__/__/____'
        }
    });
    $('.mask-date-selectonfocus').mask('00/00/0000', {selectOnFocus: true});
});

// pagination house focus
if (location.href.indexOf('?') >= 0) {
    document.getElementById('filter-houses').scrollIntoView();
}

// select change
$('#order').change(function() {
    $('#btn-search').click();
});
