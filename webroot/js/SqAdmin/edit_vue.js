var API_PREFIX = 'localhost:8765/api/v1';
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
		],
		InputTag {
			name: ""
		}
	},
	//methods: {
	//	onTagSubmit: function(event){
	//		$.ajax({
	//			url: API_PREFIX + "/posts/" + this.Posts.id + "tags/",
	//			method: "POST",
	//			dataType: "json",
	//			data: this.InputTag,
	//		});
	//	}
	//	Successにthis.Tags.push(Inputtag)すればいい;
	//},
	filters: {
		countChars : {
			write: function(val){
				this.content_count = val.length;
				return val;
			}
		}	
	}
});

