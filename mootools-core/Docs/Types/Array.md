Type: Array {#Array}
====================

A collection of Array methods and functions.
（数组常用方法和函数的集合）

### See Also(另参考):

- [MDC Array][]


Function: Array.each {#Array:Array-each}
----------------------------------

Used to iterate through arrays, or iterables that are not regular arrays, such as built in getElementsByTagName calls or arguments of a function.

(对数组进行遍历处理，如getElementsByTagName返回的结果或arguments)
### Syntax(语法):

	Array.each(iterable, fn[, bind]);

### Arguments(参数):

1. iterable - (*array*) The array to iterate through.
2. fn       - (*function*) The function to test for each element.
3. bind     - (*object*, optional 可选的) The object to use as 'this' within the function. For more information see [Function:bind][].

#### Argument(参数详解): fn

##### Syntax(语法):

	fn(item, index, object)

##### Arguments(参数):

1. item   - (*mixed*) The current item in the array.
2. index  - (*number*) The current item's index in the array. In the case of an object, it is passed the key of that item rather than the index.
3. object - (*mixed*) The actual array/object.

### Example(示例):

	Array.each(['Sun', 'Mon', 'Tue'], function(day, index){
		alert('name:' + day + ', index: ' + index);
	}); // alerts 'name: Sun, index: 0', 'name: Mon, index: 1', etc.

### See Also(另参考):

- [Array:each](#Array:each)

### Notes(备注):

This is an array-specific equivalent of *$each* from MooTools 1.2.

(和 MooTools 1.2中的 *$each* 相似，1.2中它可以是getElementsByTagName,arguments对象, 或Ojbect对象，不过在MooTools 1.3.2中已经过时了。)



Function: Array.clone {#Array:Array-clone}
------------------------------------

Returns a copy of the passed array.
（返回传入数组的一个副本）

### Syntax(语法):

	var clone = Array.clone(myArray);

### Arguments(参数):

1. myArray	- (*array*) The array you wish to copy.

### Returns(返回值):

* (*array*) a copy of the passed array.

### Example(示例):

	var myArray = ['red', 'blue', 'green'];
	var otherArray = Array.clone(myArray);

	var myArray[0] = 'yellow';

	alert(myArray[0]);		// alerts 'yellow'
	alert(otherArray[0])	// alerts 'red'

### Notes(备注):

This is an array-specific equivalent of *$unlink* from MooTools 1.2.



Function: Array.from {#Array:Array-from}
----------------------------------

Converts the argument passed in to an array if it is defined and not already an array.

(转换传入的（已经定义过且不是数组的）参数为一个数组)
### Syntax(语法):

	var splatted = Array.from(obj);

### Arguments(参数):

1. obj - (*mixed*) Any type of variable.

### Returns(返回值):

* (*array*) If the variable passed in is an array, returns the array. Otherwise, returns an array with the only element being the variable passed in.

### Example(示例):

	Array.from('hello'); // returns ['hello'].
	Array.from(['a', 'b', 'c']); // returns ['a', 'b', 'c'].

### Notes(备注):

This is equivalent to *$splat* from MooTools 1.2, with the exception of Array-like Objects such as NodeList or FileList which `Array.from` does transform in
Arrays and `$splat` not.
(MooTools 1.2 中*$splat* 意思是把传入的参数包装成一个数组，在1.3中已经不推荐使用了)


Array method: each {#Array:each}
---------------------------------

Calls a function for each element in the array.
(数组中的每一个元素调用一个函数)

### Syntax(语法):

	myArray.each(fn[, bind]);

### Arguments(参数):

1. fn   - (*function*) The function which should be executed on each item in the array. This function is passed the item and its index in the array.
(每次迭代中执行的函数. 当前迭代项及它的索引号将被作为参数传入该函数)
2. bind - (*object*, optional 可选的) The object to be used as 'this' in the function. For more information see [Function:bind][].
(函数中this所引用的对象. 详情请参看[Function:bind][])

#### Argument(参数详解): fn

##### Syntax

	fn(item, index, array)

##### Arguments(参数):

1. item   - (*mixed*) The current item in the array.(当前迭代项)
2. index  - (*number*) The current item's index in the array.(当前索引号)
3. array  - (*array*) The actual array.(迭代的数组)

### Examples(示例):

	//Alerts "0 = apple", "1 = banana", and so on:
	['apple', 'banana', 'lemon'].each(function(item, index){
		alert(index + " = " + item);
	}); //The optional second argument for binding isn't used here.


### See Also(另参考):

- [Array.each](#Array:Array-each)
- [MDC Array:forEach][]

### Notes(备注):

- This method is only available for browsers without native [MDC Array:forEach][] support.

此方法只提供给没有原生[MDC Array:forEach][]方法支持的浏览器上生效(?本人怀疑，好像不是?)






Array method: invoke {#Array:invoke}
--------------------------

Returns an array with the named method applied to the array's contents.

(将一个指定的方法运用到数组上并返回处理后的数组)

(在数组上执行一个方法，并返回这个方法执行后的数组结果)
### Syntax(语法):

	var arr = myArray.invoke(method[, arg, arg, arg ...])

### Arguments(参数):

1. method - (*string*) The method to apply to each item in the array.(该方法会作用于数组中的每一项.)
2. arg - (*mixed*) Any number of arguments to pass to the named method.(给指定方法传递任何数目的参数.)

### Returns(返回值):

* (*array*) A new array containing the results of the applied method. (返回一个新的数组，其中包含所采用的方法的结果。)

### Example(示例):

	var foo = [4, 8, 15, 16, 23, 42];
	var bar = foo.invoke('limit', 10, 30);	//bar is now [10, 10, 15, 16, 23, 30]
    /*
	例子中指定的方法为Number的 limit(),将取值范围限制在指定区间(在区间内,取原值;超出区间,则取邻近的区间边界值). 
	*/
### Notes(备注):

The method that is invoked is a method of each of the items.

(被调用的方法会作用于数组中的每一项.)

If the method does not exist, then an error will be thrown. 

(如果该方法不存在或者对于数组不是有效的，然后将抛出一个错误.)

For example:

	[0, false, 'string'].invoke('limit', 0, 10); // throws an error!
    /*
	Number的limit()方法对于混合类型的数组是无效的，所以会抛出一个错误!
	*/
Array method: every {#Array:every}
----------------------------

Returns true if every element in the array satisfies the provided testing function.
This method is provided only for browsers without native [Array:every][] support.

(如果每一个条目都满足传入的测试函数，则返回true，此方法只提供给没有原生Array:every方法的浏览器中才有效)
### Syntax(语法):

	var allPassed = myArray.every(fn[, bind]);

### Arguments(参数):

1. fn   - (*function*) The function to test for each element.
(用来测试每一个数组项的函数)
2. bind - (*object*, optional 可选的) The object to use as 'this' in the function. For more information see [Function:bind][].
(函数中this所引用的对象. 详情请参看[Function:bind][].)


#### Argument(参数详解): fn

##### Syntax(语法):

	fn(item, index, array)

##### Arguments(参数):

1. item   - (*mixed*) The current item in the array.(当前迭代项)
2. index  - (*number*) The current item's index in the array.(当前索引号)
3. array  - (*array*) The actual array.(实际数组，即迭代数组)

### Returns(返回值):

* (*boolean*) If every element in the array satisfies the provided testing function, returns true. Otherwise, returns false.
(如果数组中的每一项都通过给定函数的测试,则返回true; 否则,返回false)

### Examples(示例):

	var areAllBigEnough = [10, 4, 25, 100].every(function(item, index){
		return item > 20;
	}); // areAllBigEnough = false


### See Also(另参考):

- [MDC Array:every][]



Array method: filter {#Array:filter}
------------------------------

Creates a new array with all of the elements of the array for which the provided filtering function returns true.
This method is provided only for browsers without native [Array:filter][] support.

(将所有在给定过滤函数中过滤通过(返回为true的元素)的数组项创建一个新数组.此方法只提供给没有原生Array:filter方法支持的浏览器)

### Syntax(语法):

	var filteredArray = myArray.filter(fn[, bind]);

### Arguments(参数):

1. fn   - (*function*) The function to test each element of the array. This function is passed the item and its index in the array.
(用来测试每一个数组项的函数. 当前迭代项以及它的索引号将被作为参数传入该函数)
2. bind - (*object*, optional 可选的) The object to use as 'this' in the function. For more information see [Function:bind][].
(函数中this所引用的对象. 详情请参看[Function:bind][])

#### Argument(参数详解): fn

##### Syntax(语法):

	fn(item, index, array)

##### Arguments(参数):

1. item   - (*mixed*) The current item in the array.(当前迭代项)
2. index  - (*number*) The current item's index in the array.(当前索引号)
3. array  - (*array*) The actual array.(实际数组，即迭代数组)

### Returns(返回值):

* (*array*) The new filtered array. (过滤后的新数组)

### Examples(示例):

	var biggerThanTwenty = [10, 3, 25, 100].filter(function(item, index){
		return item > 20;
	}); // biggerThanTwenty = [25, 100]

### See Also(另参考):

- [MDC Array:filter][]



Array method: clean {#Array:clean}
----------------------------

Creates a new array with all of the elements of the array which are defined (i.e. not null or undefined).

(清除数组中为null或undefined的项，并返回一个新数组)

### Syntax(语法):

	var cleanedArray = myArray.clean();

### Returns(返回值):

* (*array*) The new filtered array.

### Examples(示例):

	var myArray = [null, 1, 0, true, false, 'foo', undefined, ''];
	myArray.clean() // returns [1, 0, true, false, 'foo', '']

Array method: indexOf {#Array:indexOf}
--------------------------------

Returns the index of the first element within the array equal to the specified value, or -1 if the value is not found.
This method is provided only for browsers without native [Array:indexOf][] support.

(返回数组中和给出参数值相等的项的索引号; 如果未找到相等的项, 则返回-1. 此方法只提供给没有原生Array:indexOf方法支持的浏览器)

### Syntax(语法):

	var index = myArray.indexOf(item[, from]);

### Returns(返回值):

* (*number*) The index of the first element within the array equal to the specified value. If not found, returns -1.

(数组中和给出参数值相等的项的索引号; 如果未找到相等的项, 则返回-1,有就为1 .)

### Arguments(参数):

1. item - (*object*) The item to search for in the array.
(目标搜索项)
2. from - (*number*, optional 可选的: defaults to 0  默认为零) The index of the array at which to begin the search.
(在数组中搜索的起始索引号.)

### Examples(示例):

	['apple', 'lemon', 'banana'].indexOf('lemon'); // returns 1
	['apple', 'lemon'].indexOf('banana'); // returns -1

### See Also(另参考):

- [MDC Array:indexOf][]



Array method: map {#Array:map}
------------------------

Creates a new array with the results of calling a provided function on every element in the array.
This method is provided only for browsers without native [Array:map][] support.

(返回一个由经过给定函数处理返回的值所创建的新数组. 此方法只提供给没有原生Array:map方法支持的浏览器)

### Syntax(语法):

	var mappedArray = myArray.map(fn[, bind]);

### Arguments(参数):

1. fn   - (*function*) The function to produce an element of the new Array from an element of the current one.
(用来处理当前迭代项并返回新值的函数.)
2. bind - (*object*, optional 可选的) The object to use as 'this' in the function. For more information see [Function:bind][].
(函数中this所引用的对象. 详情请参看[Function:bind][].)

#### Argument(参数详解): fn

##### Syntax(语法):

	fn(item, index, array)

##### Arguments(参数):

1. item   - (*mixed*) The current item in the array.(当前迭代项)
2. index  - (*number*) The current item's index in the array.(当前索引号)
3. array  - (*array*) The actual array.(实际数组，即迭代数组)

### Returns(返回值):

* (*array*) The new mapped array.

### Examples(示例):

	var timesTwo = [1, 2, 3].map(function(item, index){
		return item * 2;
	}); //timesTwo = [2, 4, 6];

### See Also(另参考):

- [MDC Array:map][]



Array method: some {#Array:some}
--------------------------

Returns true if at least one element in the array satisfies the provided testing function.
This method is provided only for browsers without native [Array:some][] support.

(如果数组中至少有一个项通过了给出的函数的测试,则返回true.此方法只提供给没有原生Array:some方法支持的浏览器).

### Syntax(语法):

	var somePassed = myArray.some(fn[, bind]);

### Returns(返回值):

* (*boolean*) If at least one element in the array satisfies the provided testing function returns true. Otherwise, returns false.
(如果数组中至少有一个项通过了给出的函数的测试,则返回true; 否则返回false)

### Arguments(参数):

1. fn   - (*function*) The function to test for each element. This function is passed the item and its index in the array.
(用于测试数组项的函数. 当前数组中的迭代项以及它在数组中的索引号将被传入该函数中)
2. bind - (*object*, optional 可选的) The object to use as 'this' in the function. For more information see [Function:bind][].
(函数中this所引用的对象.详情请参看[Function:bind][])

#### Argument(参数详解): fn

##### Syntax(语法):

	fn(item, index, array)

##### Arguments(参数):

1. item   - (*mixed*) The current item in the array.(当前迭代项)
2. index  - (*number*) The current item's index in the array.(当前索引号)
3. array  - (*array*) The actual array.(实际数组，即迭代数组)

### Examples(示例):

	var isAnyBigEnough = [10, 4, 25, 100].some(function(item, index){
		return item > 20;
	}); // isAnyBigEnough = true

### See Also(另参考):

- [MDC Array:some][]



Array method: associate {#Array:associate}
------------------------------------

Creates an object with key-value pairs based on the array of keywords passed in and the current content of the array.

(创建一个键值对对象,该对象中的键由作为参数传入的一个数组决定,值由主调数组决定)

### Syntax(语法):

	var associated = myArray.associate(obj);

### Arguments(参数):

1. obj - (*array*) Its items will be used as the keys of the object that will be created.
(作为键源的数组)

### Returns(返回值):

* (*object*) The new associated object.
(新创建的键值对对象)

### Examples(示例):

	var animals = ['Cow', 'Pig', 'Dog', 'Cat'];
	var sounds = ['Moo', 'Oink', 'Woof', 'Miao'];
	sounds.associate(animals);
	// returns {'Cow': 'Moo', 'Pig': 'Oink', 'Dog': 'Woof', 'Cat': 'Miao'}



Array method: link {#Array:link}
--------------------------

Accepts an object of key / function pairs to assign values.
(根据给出的 '键/测试函数'对, 来创建一个新的键值对对象)

### Syntax(语法):

	var result = myArray.link(object);

### Arguments(参数):

1. object - (*object*)  An object containing key / function pairs must be passed to be used as a template for associating values with the different keys.
(包含'键/测试函数'的对象)

### Returns(返回值):

* (*object*) The new associated object.

(新创建的键值对对象)

### Examples(示例):
    /*1.2中的例子*/
	var el = document.createElement('div');
	var arr2 = [100, 'Hello', {foo: 'bar'}, el, false, 300];
	var a=arr2.link({
		myNumber: Number.type,
		myNumber2: function(item){
			if(item >= 200) return true;
		}, 
		myElement: Element.type, 
		myObject: Object.type, 
		myString: String.type, 
		myBoolean: $defined
	});
	/**
	 *  返回 
	 *  {
	 *      myNumber: 100,
	 *      myNumber2: 300,
	 *      myElement: el, 
	 *      myObject: {
	 *          foo: 'bar'
	 *      }, 
	 *      myString: 'Hello', 
	 *      myBoolean: false
	 *  }
	 *  
	 *  备注说明: 当前键的取值搜索范围是前一个键的测试挑选剩余后的数组项(而不是整个数组项)
	 */
	
	
    /*1.3.2中的例子*/
	var el = document.createElement('div');
	var arr2 = [100, 'Hello', {foo: 'bar'}, el, false];
	arr2.link({
		myNumber: Type.isNumber,
		myElement: Type.isElement,
		myObject: Type.isObject,
		myString: Type.isString,
		myBoolean: function(obj){ return obj != null; }
	});
	// returns {myNumber: 100, myElement: el, myObject: {foo: 'bar'}, myString: 'Hello', myBoolean: false}
   

Array method: contains {#Array:contains}
----------------------------------

Tests an array for the presence of an item.

(测试指定项是否在数组中存在)

### Syntax(语法):

	var inArray = myArray.contains(item[, from]);

### Arguments(参数):

1. item - (*object*) The item to search for in the array.
(要进行测试的项)
2. from - (*number*, optional 可选的: defaults to 0 默认为零) The index of the array at which to begin the search.
(在数组中开始搜索的起始位索引,就是从第几个索引位置开始查找)

### Returns(返回值):

* (*boolean*) If the array contains the item specified, returns true. Otherwise, returns false.
(如果数组包含指定的项,则返回true; 否则返回false)

### Examples(示例):

	['a', 'b', 'c'].contains('a'); // returns true
	['a', 'b', 'c'].contains('d'); // returns false

### See Also(另参考):

- [MDC Array:indexOf][]



Array method: append {#Array:append}
------------------------------

Appends the passed array to the end of the current array.

(把传入的数组追加到当前数组的末尾)

### Syntax(语法):

	var myArray = myArray.append(otherArray);

### Arguments(参数):

1. otherArray - (*array*) The array containing values you wish to append.(你要想追加的数组.)

### Returns(返回值):

* (*array*) The original array including the new values.(原始数组和追加数组的合并体，即一个新的数组.)

### Examples(示例):

	var myOtherArray = ['green', 'yellow'];
	['red', 'blue'].append(myOtherArray); // returns ['red', 'blue', 'green', 'yellow'];
	myOtheArray; // is now ['red', 'blue', 'green', 'yellow'];

	[0, 1, 2].append([3, [4]]); // [0, 1, 2, 3, [4]]

### Notes(备注):

This is an array-specific equivalent of *$extend* from MooTools 1.2.

(这是Array的特性，相当于MooTools 1.2中*$extend*)



Array method: getLast {#Array:getLast}
--------------------------------

Returns the last item from the array.

(返回数组中的最后一项)

### Syntax(语法):

	myArray.getLast();

### Returns(返回值):

* (*mixed*) The last item in this array.(数组中的最后一项)
* (*null*) If this array is empty, returns null.(如果是空数组,则返回null)

### Examples(示例):

	['Cow', 'Pig', 'Dog', 'Cat'].getLast(); // returns 'Cat'



Array method: getRandom {#Array:getRandom}
------------------------------------

Returns a random item from the array.

(返回从数组中随机抽取的一项)

### Syntax(语法):

	myArray.getRandom();

### Returns(返回值):

* (*mixed*) A random item from this array. If this array is empty, returns null.
(从数组中随机抽取的一项; 如果是空数组,则返回null)

### Examples(示例):

	['Cow', 'Pig', 'Dog', 'Cat'].getRandom(); // returns one of the items



Array method: include {#Array:include}
--------------------------------

Pushes the passed element into the array if it's not already present (case and type sensitive).

(向数组中添加一项, 如果该项在数组中已经存在,则不再添加.)

### Syntax(语法):

	myArray.include(item);

### Arguments(参数):

1. item - (*object*) The item that should be added to this array.(目标添加项)

### Returns(返回值):

* (*array*) This array with the new item included.(添加元素后的主调数组)

### Examples(示例):

	['Cow', 'Pig', 'Dog'].include('Cat'); // returns ['Cow', 'Pig', 'Dog', 'Cat']
	['Cow', 'Pig', 'Dog'].include('Dog'); // returns ['Cow', 'Pig', 'Dog']

### Notes(备注):

If you want to push the passed element even if it's already present, use
(即使已经存在，你也要强行追加请使用 数组的push()方法)
the vanilla javascript:

	myArray.push(item);

Array method: combine {#Array:combine}
--------------------------------

Combines an array with all the items of another. Does not allow duplicates and is case and type sensitive.
(将主调数组和另一个数组进行组合(重复的项将不会加入))

### Syntax(语法):

	myArray.combine(array);

### Arguments(参数):

1. array - (*array*) The array whose items should be combined into this array.(将被组合的源数组)

### Returns(返回值):

* (*array*) This array combined with the new items.
(组合后的主调数组)

### Examples(示例):

	var animals = ['Cow', 'Pig', 'Dog'];
	animals.combine(['Cat', 'Dog']); //animals = ['Cow', 'Pig', 'Dog', 'Cat'];



Array method: erase {#Array:erase}
----------------------------

Removes all occurrences of an item from the array.

(删除数组中所有的指定项)

### Syntax(语法):

	myArray.erase(item);

### Arguments(参数):

1. item - (*object*) The item to search for in the array.(目标删除项)

### Returns(返回值):

* (*array*) This array with all occurrences of the item removed.(进行删除后的主调数组)

### Examples(示例):

	['Cow', 'Pig', 'Dog', 'Cat', 'Dog'].erase('Dog') // returns ['Cow', 'Pig', 'Cat']
	['Cow', 'Pig', 'Dog'].erase('Cat') // returns ['Cow', 'Pig', 'Dog']



Array method: empty {#Array:empty}
----------------------------

Empties an array.(清空数组)

### Syntax(语法):

	myArray.empty();

### Returns(返回值):

* (*array*) This array, emptied.(清空后的主调数组)

### Examples(示例):

	var myArray = ['old', 'data'];
	myArray.empty(); //myArray is now []


Array method: flatten {#Array:flatten}
--------------------------------

Flattens a multidimensional array into a single array.

(将多维数组扁平化(即变为一维数组))

### Syntax(语法):

	myArray.flatten();

### Returns(返回值):

* (*array*) A new flat array.(扁平化后的主调数组)

### Examples(示例):

	var myArray = [1,2,3,[4,5, [6,7]], [[[8]]]];
	var newArray = myArray.flatten(); //newArray is [1,2,3,4,5,6,7,8]



Array method: pick {#Array:pick}
--------------------------
Returns the first defined value of the array passed in, or null.
(返回参数列表中第一个非未定义的项; 如果全部未定义,则返回null)

### Syntax(语法):

	var picked = [var1, var2, var3].pick();

### Returns(返回值):

* (*mixed*) The first variable that is defined.(第一个非未定义的项)
* (*null*) If all variables passed in are `null` or `undefined`, returns `null`.(如果都是null或undefined, 则返回null)

### Example(示例):

	function say(infoMessage, errorMessage){
		alert([errorMessage, infoMessage, 'There was no message supplied.'].pick());

		//or more MooTools 1.2 style using Generics
		Array.pick([errorMessage, infoMessage, 'There was no message supplied.']);

	}
	say(); // alerts 'There was no message supplied.'
    say('This is an info message.'); // alerts 'This is an info message.'
    say('This message will be ignored.', 'This is the error message.'); // alerts 'This is the error message.'


### Notes(备注):

This is equivalent to *$pick* from MooTools 1.2.
(相当于MooTools 1.2 中*$pick*)



Array method: hexToRgb {#Array:hexToRgb}
----------------------------------

Converts an hexadecimal color value to RGB. Input array must be the following hexadecimal color format.
\['FF', 'FF', 'FF'\]
(十六进制颜色值转换为rgb值)

### Syntax(语法):

	myArray.hexToRgb([array]);

### Arguments(参数):

1. array - (*boolean*, optional 可选的) If true is passed, will output an array (e.g. \[255, 51, 0\]) instead of a string (e.g. "rgb(255, 51, 0)").
(如果传入true, 将返回rgb值的一个数组(如[255, 51, 0])而非字符串(如"rgb(255, 51, 0)"))

### Returns(返回值):

* (*string*) A string representing the color in RGB.
* (*array*) If the array flag is set, an array will be returned instead.

### Examples(示例):

	['11', '22', '33'].hexToRgb(); // returns 'rgb(17, 34, 51)'
	['11', '22', '33'].hexToRgb(true); // returns [17, 34, 51]

### See Also(另参考):

- [String:hexToRgb][]



Array method: rgbToHex {#Array:rgbToHex}
----------------------------------

Converts an RGB color value to hexadecimal. Input array must be in one of the following RGB color formats.
\[255, 255, 255\], or \[255, 255, 255, 1\]
(将RGB格式的颜色代码转换成十六进制的代码. 输入的RGB代码需要类似如下的其中一种格式:[255,255,255] 或 [255,255,255,1])

### Syntax(语法):

	myArray.rgbToHex([array]);

### Arguments(参数):

1. array - (*boolean*, optional 可选的) If true is passed, will output an array (e.g. \['ff', '33', '00'\]) instead of a string (e.g. '#ff3300').
(是否输出为数组. 如果为true,则输入的十六进制颜色将是数组格式(如: ['ff','33','00']),而不是原本的字符串形式(如: "#ff3300"))

### Returns(返回值):

* (*string*) A string representing the color in hexadecimal, or 'transparent' string if the fourth value of rgba in the input array is 0 (rgba).
(字符串格式的十六进制颜色代码, 或者若主调数组是一个代表rgba的颜色代码(即除了R,G,B外,还有一个Alpha值),且第四个值是0,则返回'transparent'(透明))
* (*array*) If the array flag is set, an array will be returned instead.
(如果设置了输出格式为数组,则返回数组格式的十六进制颜色代码)

### Examples(示例):

	[17, 34, 51].rgbToHex(); // returns '#112233'
	[17, 34, 51].rgbToHex(true); // returns ['11', '22', '33']
	[17, 34, 51, 0].rgbToHex(); // returns 'transparent'

### See Also(另参考):

- [String:rgbToHex][]



[Function:bind]: /core/Types/Function/#Function:bind
[String:hexToRgb]: /core/Types/String/#String:hexToRgb
[String:rgbToHex]: /core/Types/String/#String:rgbToHex
[MDC Array]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array
[MDC Array:every]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/every
[MDC Array:filter]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/filter
[MDC Array:indexOf]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/indexOf
[MDC Array:map]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/map
[MDC Array:some]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/some
[MDC Array:forEach]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/forEach
[Array:every]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/every
[Array:filter]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/filter
[Array:indexOf]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/indexOf
[Array:map]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/map
[Array:some]: https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Global_Objects/Array/some
