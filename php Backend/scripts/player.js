const game_code = document.getElementById('game_code').value;
const p1 = document.getElementById('p1-name');
const p2 = document.getElementById('p2-name');
const score1 = document.getElementById('my-score');
const score2 = document.getElementById('other-score');
const myId = document.getElementById('my-id').value;
const scoreColumn = document.getElementById('score-column').value;


const submitBtn = document.getElementById('submit-btn');
const leaveBtn = document.getElementById('leave-btn');
const object_name = document.getElementById('object-name');

let list = ["Apple", "Mango", "Car", "Cat", "House", "Ice Cream", "Cake", "Guitar"]


updateGame(); // get the user details in the UI

function updateGame(){
	fetch("http://localhost/doodle-mate/includes/get_game.php", {
		method: 'POST',
	  	headers: new Headers({
	        'Content-Type': 'application/x-www-form-urlencoded',
	    }),
	  	body: "game_code="+game_code
	})
	.then((res) => res.json())
	.then((data) => {
		p1.innerHTML = myId;
		p2.innerHTML = data.player2_id === myId ? data.player1_id : data.player2_id;
		score1.innerHTML = data.player2_id === myId ? data.score2 : data.score1 + "pts";
		score2.innerHTML = data.player2_id === myId ? data.score1 : data.score2 + "pts";
		if(data.ended == 1){
			alert('Game Ended, May be Your Probably your Doodle Mate left');
			window.location.href = 'logout.php';
		}
	})
}
setInterval(updateGame, 5000)	// --------update game UI after every 5 seconds---------

leaveBtn.addEventListener('click', function(){
	if(confirm("Are You sure to end this game?")){
		fetch("http://localhost/doodle-mate/includes/end_game.php", {
			method: 'POST',
		  	headers: new Headers({
		        'Content-Type': 'application/x-www-form-urlencoded',
		    }),
		  	body: "game_code="+game_code
		})
		.then((res) => res.json())
		.then((data) => {
			console.log(data);
			alert('Game Ended');
			window.location.href = 'logout.php';
		})
	}
})

submitBtn.addEventListener('click', function(){
	erase(); // function in drawing.js to clear the canvas
	var img = canvas.toDataURL(); 
	
	let url;
	// url = "save_img.php";
	// url = "Our Python server URL which have ML Model"
	url = "http://127.0.0.1:5000/img"
	fetch(url, {
			method: 'POST',
			headers: new Headers({
		        'Content-Type': 'application/x-www-form-urlencoded',
		    }),
		  	body: "game_code="+game_code+"&userId="+myId+"&scoreColumn="+scoreColumn+"&img="+img
		})
		.then((res) => res.text())
		.then((data) => {
			console.log(data); // the server will use some APIs to update score into the database
			updateGame(); // get the UI updated
			// ----------- Give ne Doodle name to be drawn by the players
			let i = Math.ceil(Math.random()*7); // get the random 
			object_name.innerHTML = list[i];
		})
})