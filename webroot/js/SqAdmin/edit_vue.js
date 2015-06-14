var edit__vue = new Vue({
	el: "#edit__vue__app",
	data: {
		content_count: 0,
		Posts:{
			title: "",
			content: "",
		},
		Tags:[
			{
				id:1,
				name: "nick"
			},
			{
				id:2,
				name: "nick-sensei"
			}	
		]
	},
	filters: {
		countChars : {
			write: function(val){
				this.content_count = val.length;
				return val;
			}
		}	
	}
});

