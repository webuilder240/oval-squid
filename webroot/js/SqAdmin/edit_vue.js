var edit__vue = new Vue({
	el: "#edit__vue__app",
	data: {
		Posts:{
			title: "",
			content: "",
		},
		content_count: 0
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

