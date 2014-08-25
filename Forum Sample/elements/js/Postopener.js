
var page = 0;
var offset = page*20;
var currentCategory = null; 
function openPost(thread){
	var currentID = 'post' + thread.getAttribute('postid').toString();  
	thread.id = currentID;
	var postid = thread.getAttribute('postid');

	var threadContainer = createQuestionElement("Mr. Nigger", thread.getAttribute("date"), thread.getAttribute("detail"), thread.getAttribute('topic'));
	destroyPosts(thread.id);
	animateTransition(thread.id, threadContainer);
	animateHeader(thread.getAttribute('topic'));

}
function openCategory(category){
	if (currentCategory !== 'category' + category.getAttribute('catid').tostring) {
		currentCategory = 'category'+category.getAttribute('catid').toString();
		var toGet = category.getAttribute('catid');
		category.id = currentCategory;

		destroyCategories(category.id);
		animateHeader(category.getAttribute('catname'));
		getPosts(0, toGet);
	}

}
function destroyCategories(givenID) {
	var element = document.getElementsByTagName('forum-category');
	for (var i = element.length - 1; i >= 0; i--) {
		if (element[i].id !== givenID) {
			element[i].id = "remove";
			deleteElement(element[i]);
			$( "#currentreply" ).hide();
			$( "#currentreply" ).fadeIn('600');
			$( "#remove" ).fadeOut('fast');
	    }
	}
}
function updateThread(replies){
	for (var i = 0; i < replies.length; i++){
		$( "activepost" ).append(replies[i]);
		replies[i].id = "activereply";
		$( "activereply" ).slideUp(fast);
		document.appendChild(replies[i]);
	}
}

function getPosts(offset, catid){
	var xmlhttp = $.ajax(
		{
		url: 'backend/postloader.php',
		type: 'GET',
		dataType: 'json',
		data: {catid: catid},
		})
	.done(function() {
		var response = JSON.parse(xmlhttp.responseText);
		for(var i=0; i<response.length;i++){	
			createPostElement(response[i].topic_id, response[i].topic_subject, response[i].topic_views, response[i].topic_replies, response[i].topic_date, response[i].topic_by, response[i].topic_details);
		}	
	});
	
}


function createPostElement(id, subject, views, replies, date, poster, details) {
	var element = document.createElement('forum-post');
	element.setAttribute('postid', id);
	element.setAttribute('topic', subject);
	element.setAttribute('views', views);
	element.setAttribute('replies', replies);
	element.setAttribute('date', date);
	element.setAttribute('details', details);
	element.addEventListener('onclick', function() {
		openPost(element);
	});
	$( "#postdiv" ).append(element);

}
function getAnswers(offset, postid){
	console.log("I LIVE");
	var xmlhttp = $.ajax(
		{
		type: "GET",
		contentType: "json",
		url: "backend/answerloader.php",
		data: {getvalues: "true", postid: postid},

		}).done(function(){
			console.log(xmlhttp.responseText);

			var response = JSON.parse(xmlhttp.responseText);
			var elements = [];
			for(var i=0; i<response.length;i++){	
					createAnswerElement(response[i].a_id, response[i].a_name, response[i].a_email, response[i].a_datetime, response[i].a_answer);
				}			
		}); 
}

function destroyPosts(givenID){
	var element = document.getElementsByTagName("forum-post");
	for (var i = element.length - 1; i >= 0; i--) {
		if (element[i].id !== givenID) {
			element[i].id = "remove";
			deleteElement(element[i]);
			$( "#currentreply" ).hide();
			$( "#currentreply" ).fadeIn('600');
			$( "#remove" ).fadeOut('fast');
	    }
	}
}
function createQuestionElement(poster, date, content,topic){
	var element = document.createElement('forum-question'); 
	element.setAttribute('poster', poster);
	element.setAttribute('date', date);
	element.setAttribute('content', content);
	element.setAttribute('topic', topic);
	element.id = "activepost";
	element.style.display="none";
	return element;
}
function createAnswerElement(num, name, poster, date, details){
	var element = document.createElement('forum-answer'); 
	element.setAttribute('poster', poster);
	element.setAttribute('date', date);
	element.setAttribute('details', details);
	element.setAttribute('answername', name);
	element.setAttribute('postnum', num);
	element.id = "currentreply";
	$( "#replydiv" ).append(element);
	$( "#currentreply" ).hide();
	$( "#currentreply" ).fadeIn('600');
	//document.appendChild(element);
}

function animateTransition(currentID, replacement){

	var toget = document.getElementById(currentID).getAttribute('postid');
	$( "#" + currentID ).replaceWith(replacement);
	$("#activepost").fadeIn('slow', function() {
		replacement.style.display = "block";
		getAnswers(offset, toget);
	});
}
function animateHeader(text){
	$( "#titleText" ).fadeOut( "100", function() {
		$( "#titleText" ).text(text);
		$( "#titleText" ).fadeIn( "200" );
	});

}

function deleteElement(i) {
	setTimeout(function() {
		i.parentNode.removeChild(i);
	}, 1000); 
}

