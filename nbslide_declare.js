	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info1 = $('info1').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS1 = new noobSlide({
			autoPlay: true,
			interval: 6000,
			mode: 'vertical',
			box: $('box1'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev1'),
				play: $('play1'),
				stop: $('stop1'),
				next: $('next1')
			},*/
			onWalk: function(currentItem){
				info2.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info1);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info1);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info2 = $('info2').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS2 = new noobSlide({
			autoPlay: true,
			interval: 6500,
			mode: 'vertical',
			box: $('box2'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev2'),
				play: $('play2'),
				stop: $('stop2'),
				next: $('next2')
			},*/
			onWalk: function(currentItem){
				info2.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info2);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info2);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info3 = $('info3').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS3 = new noobSlide({
			autoPlay: true,
			interval: 7000,
			mode: 'vertical',
			box: $('box3'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev3'),
				play: $('play3'),
				stop: $('stop3'),
				next: $('next3')
			},*/
			onWalk: function(currentItem){
				info3.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info3);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info3);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info4 = $('info4').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS4 = new noobSlide({
			autoPlay: true,
			interval: 7500,
			mode: 'vertical',
			box: $('box4'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev4'),
				play: $('play4'),
				stop: $('stop4'),
				next: $('next4')
			},*/
			onWalk: function(currentItem){
				info4.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info4);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info4);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info5 = $('info5').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS5 = new noobSlide({
			autoPlay: true,
			interval: 8000,
			mode: 'vertical',
			box: $('box5'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev4'),
				play: $('play4'),
				stop: $('stop4'),
				next: $('next4')
			},*/
			onWalk: function(currentItem){
				info5.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info5);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info5);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info6 = $('info6').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS6 = new noobSlide({
			autoPlay: true,
			interval: 8000,
			mode: 'vertical',
			box: $('box6'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev4'),
				play: $('play4'),
				stop: $('stop4'),
				next: $('next4')
			},*/
			onWalk: function(currentItem){
				info6.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info6);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info6);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info7 = $('info7').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS7 = new noobSlide({
			autoPlay: true,
			interval: 8000,
			mode: 'vertical',
			box: $('box7'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev4'),
				play: $('play4'),
				stop: $('stop4'),
				next: $('next4')
			},*/
			onWalk: function(currentItem){
				info7.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info7);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info7);
			}
		});
	});

	window.addEvent('domready',function(){
		//SAMPLE 5 (mode: vertical, using "onWalk" )
		var info8 = $('info8').set('opacity',0.5);
		var sampleObjectItems =[
			{title:'Реклама', autor:'Lorem', date:'5 Jun 2007', link:'http://www.link1.com'},
			{title:'Баннер', autor:'Ipsum', date:'6 Dic 2007', link:'http://www.link2.com'},
			{title:'Слайд', autor:'Dolor', date:'9 Feb 2007', link:'http://www.link3.com'},
		];
		var nS8 = new noobSlide({
			autoPlay: true,
			interval: 8000,
			mode: 'vertical',
			box: $('box8'),
			size: 150,
			items: sampleObjectItems,
			/*addButtons: {
				previous: $('prev4'),
				play: $('play4'),
				stop: $('stop4'),
				next: $('next4')
			},*/
			onWalk: function(currentItem){
				info8.empty();
				new Element('h4').set('html','<a href="'+currentItem.link+'">link</a>'+currentItem.title).inject(info8);
				new Element('p').set('html','<b>Autor</b>: '+currentItem.autor+' &nbsp; &nbsp; <b>Date</b>: '+currentItem.date).inject(info8);
			}
		});
	});
