var edit__vue = new Vue({
	el: "#edit__vue__app",
	data: {
		Posts:{
			title: "",
			content: "",
		},
		content_count: 0,
		Tags: [
			{
				id:"1",
				name: "nick"
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
	},
	methods: {
		
	}
});

