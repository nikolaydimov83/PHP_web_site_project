
var page = 0;
var offset = page*20;
var currentCategory;
var categoryName;
var categoryID;
var currentThread;
var replyOpen;
function openPost(thread){
	var currentID = 'post' + thread.getAttribute('postid').toString();  
	thread.id = currentID;
	currentThread = thread.getAttribute('postid');
	var postid = thread.getAttribute('postid');

	var posterName = getThreadPoster(thread);
	var threadContainer = createQuestionElement(posterName, thread.getAttribute("date"), thread.getAttribute("detail"), thread.getAttribute('topic'));

	addView(thread.getAttribute('postid').toString());
	document.getElementById('backbutton').setAttribute('onclick', 'goBackPosts()');
	destroyPosts(thread.id);
	animateTransition(thread.id, threadContainer);
	animateHeader(thread.getAttribute('topic'));

}
function addView(givenID) {
	$.ajax({
		url: 'backend/viewcounter.php',
		type: 'POST',
		data: {viewedTopicID: parseInt(givenID)},
	}).done(function(){
		console.log(givenID);
	});
}
function openCategory(category){
	if (currentCategory !== 'category' + category.getAttribute('catid').toString()) {
		currentCategory = 'category'+category.getAttribute('catid').toString();
		var toGet = category.getAttribute('catid');
		categoryName = category.getAttribute('catname');
		categoryID = category;
		category.id = currentCategory;
		category.setAttribute('finished', true);
		$( "#backbutton" ).fadeIn();
		document.getElementById('backbutton').setAttribute('onclick', 'goBackCategories()');

		destroyCategories(category.id);
		animateHeader(category.getAttribute('catname'));
		getPosts(0, toGet);
	}

}
function getThreadPoster(thread) {
	var synchttp = $.ajax({
		url: 'backend/ownergetter.php',
		type: 'GET',
		dataType: 'text',
		async: true,
		data: {getname: 'true', threadID: thread.getAttribute('poster')},
	})
	.done(function() {
		var result = synchttp.responseText;
		document.getElementById("activepost").setAttribute('poster', result);
	});
	
}
function destroyCategories(givenID) {
	var element = document.getElementsByTagName('forum-category');
	for (var i = element.length - 1; i >= 0; i--) {
			element[i].id = "remove";
			$("#remove").hide();
    		deleteElement(element[i]);
	}
}
function updateThread(replies){
	for (var i = 0; i < replies.length; i++){
		$( "activepost" ).append(replies[i]);
		replies[i].id = "activereply";
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
		var elements = [];
		for(var i=0; i<response.length;i++){	
			elements.push(response[i]);
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
	element.setAttribute('detail', details);
	element.setAttribute('poster',poster);
	element.setAttribute('onclick', 'openPost(this)');

	element.id = "currentpost";
	$( "#postdiv" ).append(element);


}
function getAnswers(offset, postid){
	var xmlhttp = $.ajax(
		{
		type: "GET",
		contentType: "json",
		url: "backend/answerloader.php",
		data: {getvalues: "true", postid: postid},

		}).done(function(){
			var response = JSON.parse(xmlhttp.responseText);
			var elements = [];
			for(var i=response.length-1;i>=0;i--){	
					createAnswerElement(response[i].post_id, response[i].post_by, response[i].post_date, response[i].post_content);
				}			
		}); 
}

function destroyPosts(givenID){
	var element = document.getElementsByTagName("forum-post");
	for (var i = element.length - 1; i >= 0; i--) {
		if (element[i].id !== givenID) {
			element[i].style.display = "none";
			deleteElement(element[i]);
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
	getButtons(poster, element);
	return element;
}
function createAnswerElement(num, poster, date, details){
	var element = document.createElement('forum-answer'); 
	element.setAttribute('poster', poster);
	element.setAttribute('date', date);
	element.setAttribute('details', details);
	element.setAttribute('postnum', num);
	element.id = "currentreply";
	getButtons(poster, element);
	$( "#replydiv" ).append(element);
	$( "#currentreply" ).fadeIn('fast');
	//document.appendChild(element);
}
function goBackPosts(){

	animateHeader(categoryName);
	currentCategory = null;
	getPosts(0, categoryID.getAttribute('catid'));
	destroyPosts();
	removeChildrenFromNode(document.getElementById('postdiv'));
	removeChildrenFromNode(document.getElementById('replydiv'));
	$( "#activepost" ).remove();
	document.getElementById('backbutton').setAttribute('onclick', 'goBackCategories()');
}
function goBackCategories(){
	animateHeader("Index");
	currentCategory = null;
	removeChildrenFromNode(document.getElementById('catdiv'));
	destroyPosts();
	getCategories();
	document.getElementById('backbutton').style.display = "none";
}
function getCategories() {
	$.get('backend/getcategories.php', function(data) {
		$('#catdiv').append(data);
	});
}
function removeChildrenFromNode(node) {
	if(node.hasChildNodes()) {
		while(node.childNodes.length >= 1 ) {
			node.removeChild(node.firstChild);
		}
	}
}
function animateTransition(currentID, replacement){

	var toget = document.getElementById(currentID).getAttribute('postid');
	$( "#" + currentID ).replaceWith(replacement);
	$("#activepost").fadeIn(function() {
		replacement.style.display = "block";
	});
	getAnswers(offset, toget);
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

function getButtons(poster, post){
	var xmlhttp = $.ajax({
		url: 'elements/postactions.php',
		type: 'GET',
		data: {topic_by: poster},
	})
	.done(function() {
		backup = post.id;
		post.id = "appender";
		$('#appender').append(xmlhttp.responseText);
		post.id = backup;
	});
}

function getReplyForm(){
	if (!replyOpen) {
		replyOpen = true;
	var xmlhttp = $.ajax({
		url: 'elements/reply.php',
		type: 'GET',
		data: {reply: true}
	})
	.done(function() {
		console.log('sucess');
		$( "#answerdiv").append(xmlhttp.responseText);
	});
}
}


function sendReply(){

	var text = document.getElementById('replytext').value;
	if (text.length < 20) {
		alert("needs to be longer than 20 characters");
	}else{
		$.ajax({
			url: 'backend/reply.php',
			type: 'POST',
			data: {'reply-content': document.getElementById('replytext').value, 'threadid': currentThread},
		})
		.done(function() {
		});
		removeChildrenFromNode(document.getElementById("answerdiv"));
	}
}