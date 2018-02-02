<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= 'هذا الحقل {field} مطلوب.';
$lang['form_validation_isset']			= 'هذا الحقل {field} يجب ان يحتوى على قيمة.';
$lang['form_validation_valid_email']		= 'هذا الحقل {field} يجب ان يحتوى على عنوان بريد الكترونى صحيح.';
$lang['form_validation_valid_emails']		= 'هذا الحقل {field} يجب ان يحتوى على عناوين بريد الكترونى صحيح.';
$lang['form_validation_valid_url']		= 'هذا الحقل {field} يجب ان يحتوى URL صحيح.';
$lang['form_validation_valid_ip']		= 'هذا الحقل {field} يجب ان يحتوى على IP صحيح.';
$lang['form_validation_min_length']		= 'هذه الحقل {field} الحقل يجب ان يكون اقل من {param} حروف ';

$lang['form_validation_max_length']		= 'هذا الحقل {field} الحقل لا يجب ان يتجاوز {param} حروف .';

$lang['form_validation_exact_length']		= 'هذا {field} الحقل يجب ان يكون عدد {param} حروف بالظبط.';
$lang['form_validation_alpha']			= 'هذا الحقل {field} الحقل يجب ان يحتوى على حروف ابجدية فقط.';
$lang['form_validation_alpha_numeric']		= 'هذا الحقل {field} الحقل يجب ان يحتوى على ارقام صحيحية فقط.';
$lang['form_validation_alpha_numeric_spaces']	= 'هذا الحقل {field} الحقل يجب ان يحتوى على ارقام صحيحية و مسافات فقط.';
$lang['form_validation_alpha_dash']		= 'هذا الحقل {field} الحقل يجب ان يحتوى على ارقام صحيحية, underscores, and dashes.';
$lang['form_validation_numeric']		= 'هذا  الحقل {field} الحقل يجب ان يحتوى على ارقام صحيحية فقط.';
$lang['form_validation_is_numeric']		= 'هذا الحقل {field} الحقل يجب ان يحتوى على ارقام صحيحية فقط.';
$lang['form_validation_integer']		= 'هذا الحقل {field} الحقل يجب ان يكون ارقام صحيحية.';
$lang['form_validation_regex_match']		= 'هذا {field} الحقل فى نسق غير صحيح.';
$lang['form_validation_matches']		= 'هذا الحقل {field} لا يتوافق مع الحقل {param} .';
$lang['form_validation_differs']		= 'هذا الحقل {field} يجب ان يكون مختلف عن الحقل {param} .';
$lang['form_validation_is_unique'] 		= 'هذا الحقل {field} يجب ان يحتوى على قيم منفردة.';
$lang['form_validation_is_natural']		= 'هذا الحقل {field} يجب ان يحتوى على ارقام من ال 0 الى 9.';
$lang['form_validation_is_natural_no_zero']	= 'هذا الحقل {field} يجب ان يحتوى على ارقام و تكون اكبر من الصفر.';

$lang['form_validation_decimal']		= 'هذا {field} يجب ان يحتوى على ارقام عشرية.';

$lang['form_validation_less_than']		= 'هذا {field} يجب ان يحتوى على ارقام من الحقل {param}.';
$lang['form_validation_less_than_equal_to']	= 'هذا {field} يجب ان يحتوى على ارقام اقل او اكبر من الحقل {param}.';
$lang['form_validation_greater_than']		= 'هذا {field} يجب ان يحتوى على ارقام اكبر من الحقل {param}.';
$lang['form_validation_greater_than_equal_to']	= 'هذا {field} يجب ان يحتوى على ارقام اكبر او تساوى من الحقل {param}.';
$lang['form_validation_error_message_not_set']	= 'غير قادر على تمرير رسالة الخطأ الى الحقل {field}.';
$lang['form_validation_in_list']		= 'هذا {field} يجب ان يكون واحد من {param}.';

