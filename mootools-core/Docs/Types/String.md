Type: String {#String}
====================

A collection of the String Object methods and functions.

(字符串对象常用方法和函数的集合)

### See Also(另参考):

- [MDC String][]



Function: String.from {#String:String-from}
------------------------------------

Returns the passed parameter as a String.

(把传入的参数转换成为字符串)

### Syntax(语法):

	String.from(arg);

### Arguments(参数):

1. arg - (*mixed*) The argument to return as a string.(把参数作为字符串返回.)

### Returns(返回值):

* (*string*) The argument as a string.

### Example(示例):

	String.from(2); // returns '2'
	String.from(true); // returns 'true'



Function: String.uniqueID {#String:String-uniqueID}
---------------------------------------------------

Generates a unique ID
(生成一个唯一的id)

### Syntax(语法):

	String.uniqueID();

### Returns(返回值):

* (*string*) A unique ID.

### Example(示例):

	String.uniqueID();


String method: test {#String:test}
---------------------------

Searches for a match between the string and a regular expression.
For more information see [MDC Regexp:test][].

(使用正则表达式对字符串进行匹配测试. 详情请另参考[MDC Regexp:test][].)

### Syntax(语法):

	myString.test(regex[, params]);

### Arguments(参数):

1. regex  - (*mixed*) The string or regular expression you want to match the string with.
(要匹配的字符串或正则表达式)
2. params - (*string*, optional) If first parameter is a string, any parameters you want to pass to the regular expression ('g' has no effect).
(如果第一个参数regex是一个字符串, 则本参数可为任何正则表达式参数(注意, 参数'g'无效))

### Returns(返回值):

* (*boolean*) `true`, if a match for the regular expression is found in this string.(匹配成功, 返回true)
* (*boolean*) `false` if is not found(匹配失败, 返回false)

### Examples(示例)

	'I like cookies'.test('cookie'); // returns true
	'I like cookies'.test('COOKIE', "i"); // returns true (ignore case)
	'I like cookies'.test('cake'); // returns false

### See Also(另参考):

- [MDC Regular Expressions][]



String method: contains {#String:contains}
-----------------------------------

Checks to see if the string passed in is contained in this string.
If the separator parameter is passed, will check to see if the string is contained in the list of values separated by that parameter.

(检测字符串内是否包含参数所给出的字符串.如果给出了separator(分隔符)这个参数, 则匹配时将把主字符串看作按分割符切分的一个列表, 然后将需要检测的字符串和这些列表项进行比较)

### Syntax(语法):

	myString.contains(string[, separator]);

### Arguments(参数):

1. string    - (*string*) The string to search for.
(目标测试字符串)
2. separator - (*string*, optional) The string that separates the values in this string (e.g. Element classNames are separated by a ' ').
分割字符串(如: ' ', ','等)

### Returns(返回值):

* (*boolean*) `true` if the string is contained in this string(如果目标字符串在本字符串内, 则返回true)
* (*boolean*) `false` if not.(如果目标字符串在本字符串内不存在, 则返回false)

### Examples(示例)

	'a bc'.contains('bc'); // returns true
	'a b c'.contains('c', ' '); // returns true
	'a bc'.contains('b', ' '); // returns false



String method: trim {#String:trim}
---------------------------

Trims the leading and trailing spaces off a string.

(清除字符串两端的空白字符串)

### Syntax(语法):

	myString.trim();

### Returns(返回值):

* (*string*) The trimmed string.(清理后的字符串)

### Examples(示例)

	'    i like cookies     '.trim(); // returns 'i like cookies'



String method: clean {#String:clean}
-----------------------------

Removes all extraneous whitespace from a string and trims it ([String:trim][]).

(清除整个字符串中多余的空白字符串)

### Syntax(语法):

	myString.clean();

### Returns(返回值):

* (*string*) The cleaned string.

### Examples(示例)

	' i      like     cookies      \n\n'.clean(); // returns 'i like cookies'



String method: camelCase {#String:camelCase}
-------------------------------------

Converts a hyphenated string to a camelcased string.

(将以连字符分隔的字符串转换成以大小写(驼峰)形式进行分隔的字符串)

### Syntax(语法):

	myString.camelCase();

### Returns(返回值):

* (*string*) The camelcased string.(以大小写(驼峰)形式进行分隔的字符串)

### Examples(示例)

	'I-like-cookies'.camelCase(); // returns 'ILikeCookies'



String method: hyphenate {#String:hyphenate}
-------------------------------------

Converts a camelcased string to a hyphenated string.

(将以大小写形式进行分隔的字符串转换成连字符符形式分隔的字符串)

### Syntax(语法):

	myString.hyphenate();

### Returns(返回值):

* (*string*) The hyphenated string.(以连字符分隔的字符串)

### Examples(示例)

	'ILikeCookies'.hyphenate(); // returns '-i-like-cookies'



String method: capitalize {#String:capitalize}
---------------------------------------

Converts the first letter of each word in a string to uppercase.

(将字符串中每个单词的首字母大写)

### Syntax(语法):

	myString.capitalize();

### Returns(返回值):

* (*string*) The capitalized string.(返回首字母大写的字符串)

### Examples(示例)

	'i like cookies'.capitalize(); // returns 'I Like Cookies'



String method: escapeRegExp {#String:escapeRegExp}
-------------------------------------------

Escapes all regular expression characters from the string.

(将字符串中对正则表达式敏感的字符进行转义)

### Syntax(语法):

	myString.escapeRegExp();

### Returns(返回值):

* (*string*) The escaped string.(转义后的字符串)

### Examples(示例)

	'animals.sheep[1]'.escapeRegExp(); // returns 'animals\.sheep\[1\]'



String method: toInt {#String:toInt}
-----------------------------

Parses this string and returns a number of the specified radix or base.

(将字符串解析为一个数值, 并以给出的基准进制计算为一个十进制整数)

### Syntax(语法):

	myString.toInt([base]);

### Arguments(参数):

1. base - (*number*, optional) The base to use (defaults to 10).(基准进制(默认为10).)

### Returns(返回值):

* (*number*) The number.(解析并计算后的数值)
* (*NaN*) If the string is not numeric, returns NaN.(如果字符串内容不是数值, 则返回NaN)

### Examples(示例)

	'4em'.toInt(); // returns 4
	'10px'.toInt(); // returns 10

### See Also(另参考):

- [MDC parseInt][]



String method: toFloat {#String:toFloat}
---------------------------------

Parses this string and returns a floating point number.

(将字符串解析为一个浮点数)

### Syntax(语法):

	myString.toFloat();

### Returns(返回值):

* (*number*) The float.(浮点数)
* (*NaN*) If the string is not numeric, returns NaN.(如果字符串内容不是数值, 则返回NaN)

### Examples(示例)

		'95.25%'.toFloat(); // returns 95.25
		'10.848'.toFloat(); // returns 10.848

### See Also(另参考):

- [MDC parseFloat][]



String method: hexToRgb {#String:hexToRgb}
-----------------------------------

Converts a hexadecimal color value to RGB. Input string must be in one of the following hexadecimal color formats (with or without the hash).
'#ffffff', #fff', 'ffffff', or 'fff'

(将代表十六进制颜色代码的字符串转换成RGB格式的颜色代码.字符串的颜色格式必须是如下格式的(可以不带前缀的#):'#ffffff', #fff', 'ffffff', 或 'fff')

### Syntax(语法):

	myString.hexToRgb([array]);

### Arguments(参数):

1. array - (*boolean*, optional) If true is passed, will output an array (e.g. \[255, 51, 0\]) instead of a string (e.g. "rgb(255,51,0)").
(如果为true, 则输出为一个数组形式, 而不是通常的字符串形式)

### Returns(返回值):

* (*string*) A string representing the color in RGB.(RGB格式的颜色代码字符串)
* (*array*) If the array flag is set, an array will be returned instead.(如果设置了array为true, 则返回数组形式的RGB颜色代码)

### Examples(示例)

	'#123'.hexToRgb(); // returns 'rgb(17, 34, 51)'
	'112233'.hexToRgb(); // returns 'rgb(17, 34, 51)'
	'#112233'.hexToRgb(true); // returns [17, 34, 51]



String method: rgbToHex {#String:rgbToHex}
-----------------------------------

Converts an RGB color value to hexadecimal. Input string must be in one of the following RGB color formats.
"rgb(255, 255, 255)", or "rgba(255, 255, 255, 1)"

(将代表RGB格式的颜色代码的字符串转换成十六进制颜色代码.字符串的RGB颜色格式必须是如下格式:"rgb(255,255,255)", 或 "rgba(255,255,255,1)")

### Syntax(语法):

	myString.rgbToHex([array]);

### Arguments(参数):

1. array - (*boolean*, optional) If true is passed, will output an array (e.g. \['ff', '33', '00'\]) instead of a string (e.g. "#ff3300").
(如果为true, 则输出为一个数组形式(如： ['ff','33','00']), 而不是通常的字符串形式(如: "#ff3300"))

### Returns(返回值):

* (*string*) A string representing the color in hexadecimal, or transparent if the fourth value of rgba in the input string is 0.
(十六进制的颜色代码字符串; 或者, 如果RGB代码设置了第四个值(alpha)为0, 则返回'transparent')
* (*array*) If the array flag is set, an array will be returned instead.
(如果设置了array为true, 则返回数组形式的十六进制颜色代码)

### Examples(示例)

	'rgb(17, 34, 51)'.rgbToHex(); // returns '#112233'
	'rgb(17, 34, 51)'.rgbToHex(true); // returns ['11', '22', '33']
	'rgba(17, 34, 51, 0)'.rgbToHex(); // returns 'transparent'

### See Also(另参考):

- [Array:rgbToHex][]



String method: substitute {#String:substitute}
---------------------------------------

Substitutes keywords in a string using an object/array.
Removes undefined keywords and ignores escaped keywords.
(使用一个传入的对象或数组替换字符串关键字，移除未定义的关键字并忽略不匹配的关键字)
(对字符串中给出的替换标记进行值替换(类似简单模板).)

### Syntax(语法):

	myString.substitute(object[, regexp]);

### Arguments(参数):

1. object - (*mixed*) The key/value pairs used to substitute a string.
(用于替换字符串的名/值对)
2. regexp - (*regexp*, optional) The regexp pattern to be used in the string keywords, with global flag. Defaults to /\\?\{([^}]+)\}/g .
(自定义替换的正则表达式模式(需要带有g参数). 默认值: /\?{([^}]+)}/g (即替换大括号标识的区域))

### Returns(返回值):

* (*string*) - The substituted string.

### Examples(示例)

	var myString = '{subject} is {property_1} and {property_2}.';
	var myObject = {subject: 'Jack Bauer', property_1: 'our lord', property_2: 'saviour'};
	myString.substitute(myObject); // returns Jack Bauer is our lord and saviour



String method: stripScripts {#String:stripScripts}
----------------------------------------------------

Strips the String of its *<script>* tags and anything in between them.

(把字符串内的标签剥离字符串（从字符串中去除）)

### Syntax(语法):

	myString.stripScripts([evaluate]);

### Arguments(参数):

1. evaluate - (*boolean*, optional) If true is passed, the scripts within the String will be evaluated.
(如果传入true，字符串内的script标签将被执行)

### Returns(返回值):

* (*string*) - The String without the stripped scripts.
(返回没有标签的字符串)

### Examples(示例)

	var myString = "<script>alert('Hello')</script>Hello, World.";
	myString.stripScripts(); // returns 'Hello, World.'
	myString.stripScripts(true); // alerts 'Hello', then returns 'Hello, World.'



[MDC String]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/String
[MDC Regexp:test]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Objects/RegExp/test
[MDC Regular Expressions]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Guide/Regular_Expressions
[MDC parseInt]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Functions/parseInt
[MDC parseFloat]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Functions/parseFloat
[MDC Array]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array
[String:trim]: #String:trim
[Array:rgbToHex]: /core/Types/Array/#Array:rgbToHex
[String:trim]: #String:trim