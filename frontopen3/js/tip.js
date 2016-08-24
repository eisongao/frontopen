　var text=""; day = new Date( ); time = day.getHours( ); 
　　if (( time>=0) && (time < 7 )) 
　　　　text="夜猫子，要注意身体哦！ " 
　　if (( time >= 7 ) && (time < 12)) 
　　　　text="今天天气……哈哈哈，不去玩吗？" 
　　if (( time >= 12) && (time < 14)) 
　　　　text="午休时间哦，朋友一定是不习惯午睡的吧？！" 
　　if (( time >=14) && (time < 18)) 
　　　　text="下午茶的时间到了，休息一下吧！ " 
　　if ((time >= 18) && (time <= 22)) 
　　　　text="您又来了，可别和MM聊太久哦！" 
　　if ((time >= 22) && (time < 24)) 
　　　　text="很晚了哦，注意休息呀！" 
　　document.write(text) 