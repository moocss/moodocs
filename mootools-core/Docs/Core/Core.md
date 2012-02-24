# Type: Core {#Core}

Core contains common functions used in [MooTools][].
(包含一系列在[MooTools](http://mootools.net)中常用的工具函数。)

## Function: typeOf {#Core:typeOf}

Returns the type of an object.(返回一个对象的类型)

### Syntax:

	typeOf(obj);

### Arguments:

1. obj - (*object*) The object to inspect(目标检测对象).

### Returns:

* 'element'    - (*string*) If object is a DOM element node(DOM元素节点).
* 'elements'   - (*string*) If object is an instance of [Elements][] (Elements 元素集合).
* 'textnode'   - (*string*) If object is a DOM text node (DOM文本节点).
* 'whitespace' - (*string*) If object is a DOM whitespace node(DOM空白节点).
* 'arguments'  - (*string*) If object is an arguments object.
* 'array'      - (*string*) If object is an array (数组).
* 'object'     - (*string*) If object is an object (Object对象).
* 'string'     - (*string*) If object is a string (字符串).
* 'number'     - (*string*) If object is a number (数字).
* 'date'       - (*string*) If object is a date (日期对象).
* 'boolean'    - (*string*) If object is a boolean (布尔值).
* 'function'   - (*string*) If object is a function (函数对象).
* 'regexp'     - (*string*) If object is a regular expression (正则表达式对象).
* 'class'      - (*string*) If object is a [Class][] (created with new Class or the extend of another class).
* 'collection' - (*string*) If object is a native HTML elements collection, such as childNodes or getElementsByTagName (原生htmlelements集合, 如由方法childNodes, getElementsByTagName等获取到的结果).
* 'window'     - (*string*) If object is the window object.
* 'document'   - (*string*) If object is the document object.
* 'event'      - (*string*) If object is an event (事件).
* 'null'       - (*boolean*) If object is undefined, null, NaN or none of the above(undefined, null, NaN 或以上列出的类型都不是).

### Example:

	var myString = 'hello';
	typeOf(myString); // returns "string"

### Note:

This method is equivalent to *$type* from MooTools 1.2, with the exception that undefined and null values now return 'null' as a string, instead of false.
(此方法等同于 MooTools 1.2 中的 *$type* ,不同的是undefined 和 null 都已 返回值 'null'作为一个字符,而不是 false.)

## Function: instanceOf {#Core:instanceOf}

Checks if an object is an instance of a particular type.
(检测某个对象是不是另一个对象的实例。)

### Syntax:

	instanceOf(item, object)

### Arguments:

1. item - (*mixed*) The item to check (检测项目).
2. object - (*mixed*) The type to compare it with (与之相比较的类型).

### Returns:

* (*boolean*) Whether or not the item is an instance of the object.

### Examples:

	var foo = [];
	instanceOf(foo, Array) // returns true
	instanceOf(foo, String) // returns false

	var myClass = new Class();
	var bar = new myClass();
	instanceOf(bar, myClass) // returns true

# Type {#Type}

MooTools extends native types, like string, array or number to make them even more useful.
(MooTools 扩展的原生类型，类似于string, array 或 number，使用它们更加有用)

The types MooTools uses are(MooTools使用的类型):

- String
- Array
- Number
- Function
- RegExp
- Date
- Boolean

Custom MooTools types are(自定义的MooTools类型):

- Element
- Elements
- Event

## Type method: implement {#Type:implement}

This method implements a new method to the type's prototype.
(将一个新的方法扩展到type's(类型)的prototype(原型)上.)(这个方法可以添加function的原型对象的方法,即实例方法)


### Syntax:

	myType.implement(name, method);

**or**

	myType.implement(methods);

### Arguments:

1. name - (*string*) The method name.(要扩展类型的方法名)
2. method - (*function*) The method function.(扩展类型的方法)

**or**

1. methods - (*object*) An object with key-value pairs. The key is the method name, the value is the method function.
(键-值对的对象.键是方法名，值是方法函数体)

### Returns:

* (*object*) The type(类型).

### Examples:

	Array.implement('limitTop', function(top){
		for (var i = 0, l = this.length; i < l; i++){
			if (this[i] > top) this[i] = top;
		}
		return this;
	});

	[1, 2, 3, 4, 5, 6].limitTop(4); // returns [1, 2, 3, 4, 4, 4]

It is also possible to pass an object of methods(它也可以传递一个对象的方法):

	String.implement({
		repeat: function(times){
			var string = '';
			while (times--) string += this;
			return string;
		},
		ftw: function(){
			return this + ' FTW!';
		}
	});

	'moo! '.repeat(3); // returns "moo! moo! moo! "
	'MooTools'.ftw(); // returns "MooTools FTW!"
	('MooTools'.ftw() + ' ').repeat(2); // returns "MooTools FTW! MooTools FTW! "

## Type method: extend {#Type:extend}

Adds one or more functions to the type. These are static functions that accept for example other types to parse them into the type, or other utility functions that belong to the certain type.
(为某个类型(type)添加一个或多个静态方法，接受其他类型的方法以将参数转换成为此类型)

### Syntax:

	myType.extend(name, method);

**or**

	myType.extend(methods);

### Arguments:

1. name - (*string*) The method name.
2. method - (*function*) The method function.

**or**

1. methods - (*object*) An object with key-value pairs. The key is the method name, the value is the method function.
(键-值对的对象.键是方法名，值是方法函数体)

### Returns:

* (*object*) The type.

### Examples:

	RegExp.extend('from', function(regexp, flags){
		return new RegExp(regexp, flags);
	});

	Number.extend('parseCurrency', function(currency){
		// takes a string and transforms it into a number to
		// do certain calculations
	});

### 备注:

记住extend则是针对其本身的扩充,implement(通过扩展原型)则是针对其实例所作的扩充。	
	
## Generics {#Type:generics}

Most methods of types can be used as generic functions. These are the already existing JavaScript methods, methods MooTools adds, or methods you [implemented][implement] yourself.
(所有类型的大多数方法都可以作为泛型函数(generic functions)来使用，包括js中已经存在的方法、MooTools添加的方法或者用户自定义的方法)

### Example:

	var everyArgBiggerThanTwo = function(){
		// Instead of this(Arguments类型调用Array的every方法)
		return Array.prototype.every.call(arguments, someFunction);
		// you can use
		return Array.every(arguments, someFunction);
	};

This is useful if methods of a certain type should be used as function of another type.
 As the example above, it is used for the Arguments type, which is not a real array, so `arguments.every(fn)` would not work. However, `Array.every(arguments, fn)` does work in MooTools.
(这在一个确定类型的方法被作为其他类型的方法使用时很有用，像上面的例子，Array类型的every方法用在了Arguments类型中)

### Syntax:

	Type.methodName(thisArg[, arg1, arg2, ...]);

### Arguments:

1. thisArg - (*mixed*) This is the subject, which is usually `thisArg.method([arg1, arg2, ...]);`.
2. arg1, arg2, ... - (*mixed*) Additional arguments which will be passed as method arguments.

### Returns:

- (*mixed*) Anything the method usually returns.(任何methodName通常返回的值)

[Class]: /core/Class/Class
[Elements]: /core/Element/Element
[implement]: core/Core/Core#Type:implement
[MooTools]: http://mootools.net

---

Deprecated Functions（已过时的函数） {#Deprecated-Functions}
============================================


Function: $chk {#Deprecated-Functions:chk}
---------------------
**MooTools 1.2 中的意思:**(检测参数值存在(非null, undefined, false, 或 "")或为0. 适用于将0也视作通行条件的情况.)


This method has been deprecated and will have no equivalent in MooTools 1.3.
(此方法已过时，在MooTools 1.3中已经没有等效的方法了.)

If you really need this function you can implement it like so:
(如果你想使用此功能，可以采用下面类似的方法来实现：)

### Example:

	var $chk = function(obj){
		return !!(obj || obj === 0);
	};



Function: $clear {#Deprecated-Functions:clear}
-------------------------
**MooTools 1.2 中的意思:**(清除定时器(Timeout或Interval). 通常配合[Function:delay][]和[Function:periodical][]方法使用.)


This method has been deprecated. Please use *clearInterval* or *clearTimeout* instead.
(此方法已过时，请使用*clearInterval* or *clearTimeout* 来代替。)

### See Also:

- [MDC clearTimeout][], [MDC clearInterval][]


Function: $defined {#Deprecated-Functions:defined}
-----------------------------
**MooTools 1.2 中的意思:**(检测参数值是否已定义)


This method has been deprecated.
(此方法已过时)

If you really need this function you can implement it like so:
(如果你想使用此功能，可以采用下面类似的方法来实现：)

### Example:

	var $defined = function(obj){
		return (obj != undefined);
	};

	// or just use it like this:
	if(obj != undefined){
		// do something
	}


Function: $arguments {#Deprecated-Functions:arguments}
---------------------------------
**MooTools 1.2 中的意思:**(创建一个可返回传入参数的特定项的函数(详见示例))


This method has been deprecated and will have no equivalent in MooTools 1.3.
(此方法已过时，在MooTools 1.3中已经没有等效的方法了.)

If you really need this function you can implement it like so:
(如果你想使用此功能，可以采用下面类似的方法来实现：)

### Example:

	var $arguments = function(i){
		return function(){
			return arguments[i];
		};
	};



Function: $empty {#Deprecated-Functions:empty}
-------------------------
**MooTools 1.2 中的意思:**(一个什么事情都不做的空函数. 典型应用: 事件监听器的占位方法.)


This method has been deprecated. Use [Function.from](/core/Types/Function#Function:Function-from) instead.
(此方法已过时.用 [Function.from](/core/Types/Function#Function:Function-from) 来代替)

### Example:

	var myFunc = Function.from();
	// or better:
	var myFunc = function(){};



Function: $lambda {#Deprecated-Functions:lambda}
---------------------------
**MooTools 1.2 中的意思:**(对传入的参数进行函数封装.)


This method has been deprecated. Use [Function.from](/core/Types/Function#Function:Function-from) instead.
(此方法已过时.用 [Function.from](/core/Types/Function#Function:Function-from) 来代替)

### Example:

	myLink.addEvent('click', Function.from(false)); // prevents a link Element from being clickable



Function: $extend {#Deprecated-Functions:extend}
---------------------------
**MooTools 1.2 中的意思:**(将第二个参数对象的所有属性复制到第一个参数对象中.)


This method has been deprecated. Please use [Object.append](/core/Types/Object#Object:Object-append) instead.
(此方法已过时.用 [Object.append](/core/Types/Object#Object:Object-append) 来代替)



Function: $merge {#Deprecated-Functions:merge}
-------------------------
**MooTools 1.2 中的意思:**(合并一组对象生成新对象)


This method has been deprecated. Please use [Object.merge](/core/Types/Object#Object:Object-merge) instead.
(此方法已过时.用 [Object.merge](/core/Types/Object#Object:Object-merge) 来代替)



Function: $each {#Deprecated-Functions:each}
-----------------------
**MooTools 1.2 中的意思:**(迭代数组(包括非常规数组,如由内建的getElementsByTagName方法返回的集合对象, arguments对象, 或Ojbect对象)
)


This method has been deprecated. Please use [Array.each](/core/Types/Array#Array:Array-each) or [Object.each](/core/Types/Object#Object:Object-each) instead.
(此方法已过时.用 [Array.each](/core/Types/Array#Array:Array-each) or [Object.each](/core/Types/Object#Object:Object-each) 来代替)


Function: $pick {#Deprecated-Functions:pick}
-----------------------
**MooTools 1.2 中的意思:**(返回参数列表中第一个非未定义的项; 如果全部未定义,则返回null)


This method has been deprecated. Please use [Array.pick](/core/Types/Array#Array:pick) instead.
(此方法已过时.用 [Array.pick](/core/Types/Array#Array:pick) 来代替)


Function: $random {#Deprecated-Functions:random}
---------------------------
**MooTools 1.2 中的意思:**(返回指定区间内的一个随机整数)


This method has been deprecated. Please use [Number.random](/core/Types/Number#Number:Number-random) instead.
(此方法已过时.用 [Number.random](/core/Types/Number#Number:Number-random) 来代替)


Function: $splat {#Deprecated-Functions:splat}
-------------------------
**MooTools 1.2 中的意思:**(把传入的参数包装成一个数组)


This method has been deprecated. Please use [Array.from](/core/Types/Array#Array:Array-from) instead.
(此方法已过时.用 [Array.from](/core/Types/Array#Array:Array-from) 来代替)
However `$splat` does *not* transform Array-like objects such as NodeList or FileList in arrays, `Array.from` does.


Function: $time {#Deprecated-Functions:time}
-----------------------
**MooTools 1.2 中的意思:**(返回当前时间戳)


This method has been deprecated. Please use *Date.now()* instead.
(此方法已过时.用 *Date.now()* 来代替)

### Syntax:

	var time = Date.now();

### Returns:

* (*number*) - The current timestamp.



Function: $try {#Deprecated-Functions:try}
---------------------
**MooTools 1.2 中的意思:**(尝试执行给出的一组函数, 并返回第一个执行成功的函数的返回值; 如果一个都没执行成功,则返回null;)


This method has been deprecated. Please use [Function.attempt](/core/Types/Function#Function:Function-attempt) instead.
(此方法已过时.用 [Function.attempt](/core/Types/Function#Function:Function-attempt) 来代替)


Function: $type {#Deprecated-Functions:type}
-----------------------
**MooTools 1.2 中的意思:**(检测传入参数的类型)


This method has been deprecated. Please use [typeOf](#Core:typeOf) instead.
(此方法已过时.用 [typeOf](#Core:typeOf) 来代替)


[Array]: /core/Types/Array
[Function:bind]: /core/Types/Function/#bind
[Function:delay]: /core/Types/Function/#delay
[Function:periodical]: /core/Types/Function/#periodical
[MDC clearInterval]: https://developer.mozilla.org/en/DOM/window.clearInterval
[MDC clearTimeout]: https://developer.mozilla.org/en/DOM/window.clearTimeout
