Type: Event {#Event}
====================

MooTools Event Methods.(MooTools框架的事件对象包装类)

Event Method: constructor {#Event:constructor}
----------------------------------------------

### Syntax(语法):

	new Event([event[, win]]);

### Arguments(参数):

1. event - (*event*, required) An HTMLEvent Object.(HTMLEvent对象)
2. win   - (*window*, optional: defaults to window 可选: 默认为window) The context of the event.(事件的上下文)

#### Properties (属性):

* page.x        - (*number*) The x position of the mouse, relative to the full window.(鼠标相对整个window的x坐标)
* page.y        - (*number*) The y position of the mouse, relative to the full window.(鼠标相对整个window的y坐标)
* client.x      - (*number*) The x position of the mouse, relative to the viewport.(鼠标相对整个页面可视区域的x坐标)
* client.y      - (*number*) The y position of the mouse, relative to the viewport.(鼠标相对整个页面可视区域的y坐标)
* rightClick	- (*boolean*) True if the user clicked the right mousebutton (用户是否单击了鼠标右侧的按钮)
* wheel         - (*number*) The amount of third button scrolling.(鼠标滚轮的滚动量)
* relatedTarget - (*element*) The event related target.(事件目标的参照对象)
* target        - (*element*) The event target.(事件目标对象)
* code          - (*number*) The keycode of the key pressed.(按键的键盘代码)
* key           - (*string*) The key pressed as a lowercase string. key can be 'enter', 'up', 'down', 'left', 'right', 'space', 'backspace', 'delete', and 'esc'.
* shift         - (*boolean*) True if the user pressed the shift key.(用户是否按下shift键)
* control       - (*boolean*) True if the user pressed the control key.(用户是否按下control键)
* alt           - (*boolean*) True if the user pressed the alt key.(用户是否按下alt键)
* meta          - (*boolean*) True if the user pressed the meta key.(用户是否按下meta键)

### Examples(示例):

	$('myLink').addEvent('keydown', function(event){
	 	// the passed event parameter is already an instance of the Event class.
		alert(event.key);   // returns the lowercase letter pressed.
		alert(event.shift); // returns true if the key pressed is shift.
		if (event.key == 's' && event.control) alert('Document saved.'); //executes if the user presses Ctr+S.
	});

### Notes:

- Accessing event.page / event.client requires the page to be in [Standards Mode](http://hsivonen.iki.fi/doctype/).
(要正确获取event.page / event.client, 则需要页面使用[标准模式](http://hsivonen.iki.fi/doctype/)的DOCTYPE)
- Every event added with addEvent gets the MooTools method automatically, without the need to manually instance it.
(每个使用addEvent方法添加的事件event对象将自动获取到mootools提供的方法扩展, 不需要再去手工创建实例)


Event Method: stop {#Event:stop}
--------------------------------

Stop an Event from propagating and also executes preventDefault.

(停止事件传播和中止执行事件的默认行为)

### Syntax(语法):

	myEvent.stop();

### Returns(返回值):

* (*object*) This Event instance.(Event实例)

### Examples(示例):

##### HTML:

	<a id="myAnchor" href="http://google.com/">Visit Google.com</a>

##### JavaScript

	$('myAnchor').addEvent('click', function(event){
		event.stop(); //Prevents the browser from following the link.
		this.set('text', 'Where do you think you\'re going?'); //'this' is Element that fires the Event.
		(function(){
			this.set('text','Instead visit the Blog.').set('href', 'http://blog.mootools.net');
		}).delay(500, this);
	});

### Notes:

- Returning false within the function can also stop the propagation of the Event.
(在事件监听函数中返回false的话, 同样也可起到停止事件传播的效果)

### See Also:

- [Element.addEvent](#Element:addEvent), [Element.stopPropagation](#Event:stopPropagation), [Event.preventDefault](#Event:preventDefault), [Function:delay][]



Event Method: stopPropagation {#Event:stopPropagation}
------------------------------------------------------

Cross browser method to stop the propagation of an event (this stops the event from bubbling up through the DOM).
(停止事件的传播(停止事件在DOM结构中进行冒泡传递))

### Syntax(语法):

	myEvent.stopPropagation();

### Returns(返回值):

* (*object*) This Event object.

### Examples(示例):

"#myChild" does not cover the same area as myElement. Therefore, the 'click' differs from parent and child depending on the click location:
(此示例中, 请设置myChild的覆盖区域大小比myElement的小, 这样便于测试和看清区别.)

##### HTML:

	<div id="myElement">
		<div id="myChild"></div>
	</div>

##### JavaScript

	$('myElement').addEvent('click', function(){
		alert('click');
		return false; //和stopPropagation方法效果等同
	});
	$('myChild').addEvent('click', function(event){
		event.stopPropagation(); //阻止事件的传播, 这样myChild的click事件触发后, myElement的click事件就不会被触发
	});

### See Also:

- [Element:addEvent][]
- [MDC event.stopPropagation][]



Event Method: preventDefault {#Event:preventDefault}
----------------------------------------------------

Cross browser method to prevent the default action of the event.
(中止执行事件的默认行为)

### Syntax(语法):

	myEvent.preventDefault();

### Returns(返回值):

* (*object*) This Event object.

### Examples(示例):

##### HTML:

	<form>
		<input id="myCheckbox" type="checkbox" />
	</form>

##### JavaScript

	$('myCheckbox').addEvent('click', function(event){
		event.preventDefault(); //prevents the checkbox from being "checked".(点击后, myCheckbox将不会变成"checked"的选中状态)
	});

### See Also:

- [Element:addEvent][]
- [MDC event.preventDefault][]


Object: Event.Keys {#Event-Keys}
==============================

Additional Event key codes can be added by adding properties to the Event.Keys Object.
(可以向Event.Keys中添加其他的 键盘代码/名 映射)

#### Example:

    Event.Keys.shift = 16;
    $('myInput').addEvent('keydown', function(event){
	    if (event.key == 'shift') alert('You pressed shift.');
    });

#### Possible Keys(可能键名):

- enter
- up
- down
- left
- right
- esc
- space
- backspace
- tab
- delete

### See Also:

- [MooTools More Keyboard][]

### Note:

Since MooTools 1.3 this is a native JavaScript Object and not an instance of the deprecated Hash


[Element:addEvent]: /core/Element/Element.Event#Element:addEvent
[Function]: /core/Types/Function
[Function:bind]: /core/Types/Function/#Function:bind
[Function:pass]: /core/Types/Function/#Function:pass
[Function:delay]: /core/Types/Function/#Function:delay
[MooTools More Keyboard]: /more/Interface/Keyboard

[MDC event.stopPropagation]: https://developer.mozilla.org/en/DOM/event.stopPropagation
[MDC event.preventDefault]: https://developer.mozilla.org/en/DOM/event.preventDefault
