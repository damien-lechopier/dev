/**
 * Created by user on 15.06.2016.
 */
function Fridge(maxWeight){
	var current = 0;
	var items = {};
	this.isOpen = false,
	this.open = function(){
		if(this.isOpen){
			console.log("It's opened");
		}else{
			console.log('Open cooler');
			this.isOpen = true;
		}
	},
	this.close = function(){
		if(this.isOpen){
			console.log('Close cooler');
			this.isOpen = false;
		}else{
			console.log("It's closed");
		}
	},
	this.put = function(item){
		if(this.isOpen){
			if (item) {
				if (item.weight) {
					if (item.name) {
						if (item.weight + current <= maxWeight) {
							console.log('Положили ', item);
							current += item.weight;
							items[item.name] = item;
						} else {
							console.warn('Не помещается ', item);
						}
					} else {
						console.warn('У того что вы хотите положить должно быть свойство name');
					}
				} else {
					console.warn('У того что вы хотите положить должно быть свойство weight');
				}
			} else {
				console.error('Первый параметр обязательный');
			}
		} else {
			console.error('you should open fridge!');
		}
	};
	this.get = function  (name) {
		return items[name];
	};
};
