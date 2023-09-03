/*----- constants -----*/
const winningCombos = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6], 
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];
/*----- app's state (variables) -----*/
let board ;
let turn
let win; 
/*----- cached element references -----*/
const squares = Array.from(document.querySelectorAll('#board div'));
const messages = document.querySelector('h2');
/*----- event listeners -----*/
function addEvents(){
    document.getElementById('0').addEventListener('click', handleTurn);
    document.getElementById('1').addEventListener('click', handleTurn);
    document.getElementById('2').addEventListener('click', handleTurn);
    document.getElementById('3').addEventListener('click', handleTurn);
    document.getElementById('4').addEventListener('click', handleTurn);
    document.getElementById('5').addEventListener('click', handleTurn);
    document.getElementById('6').addEventListener('click', handleTurn);
    document.getElementById('7').addEventListener('click', handleTurn);
    document.getElementById('8').addEventListener('click', handleTurn);
}
function removeEvents(){
    document.getElementById('0').removeEventListener('click', handleTurn);
    document.getElementById('1').removeEventListener('click', handleTurn);
    document.getElementById('2').removeEventListener('click', handleTurn);
    document.getElementById('3').removeEventListener('click', handleTurn);
    document.getElementById('4').removeEventListener('click', handleTurn);
    document.getElementById('5').removeEventListener('click', handleTurn);
    document.getElementById('6').removeEventListener('click', handleTurn);
    document.getElementById('7').removeEventListener('click', handleTurn);
    document.getElementById('8').removeEventListener('click', handleTurn);

}
messages.textContent = `It's ${turn}'s turn!`
addEvents();
document.getElementById('reset-button').addEventListener('click', init);
/*----- functions -----*/
function init() {
    board = [
    '', '', '',
    '', '', '',
    '', '', ''
    ];
    addEvents();
    render();
    if(Math.floor(Math.random() * 10) < 5){
        console.log("x");
        turn = 'X';
    }
    else{
        console.log("O");
        turn = 'O';
    }
    messages.textContent = `It's ${turn}'s turn!`
    if(turn === 'X'){
        ajaxTurn();
    }
};
function render() {
    board.forEach(function(val, index){
        squares[index].textContent = val;
    });
}
function handleTurn(event) {
    let idx = squares.findIndex(function(square) {
        return square === event.target;
    });
    document.getElementById(event.target.id).removeEventListener('click', handleTurn);
    board[idx] = turn;
    // check your console logs to make sure it's working!
    if (turn === 'X') {
        turn = 'O' ;
    } else {
        turn = 'X' ;
    };
    getWinner("human"); 
};
function getWinner(player){
    $.ajax({
        url: 'getWinner.php',
        type: 'post',
        data: {winningCombos: winningCombos,
            board: board},
            //dataType:'json',
        success:function(response){
            win = response;
            console.log(win);
            if ( win === 'T' ) {
                messages.textContent = `That's a tie, queen!`
                render();
                removeEvents();
            } else if (win) { 
                messages.textContent = `${win} wins the game!`
                render();
                removeEvents();
            } else {
                messages.textContent = `It's ${turn}'s turn!`
                render();
                if(player === "human"){
                    ajaxTurn();
                }
            }
        }
    });
    //pur javascript
    // var request = new XMLHttpRequest();
    // request.onreadystatechange = function() {
    // if (request.readyState == 4) { // cerere rezolvata
    //     if (request.status == 200){ // raspuns Ok
    //         win = response.requestText;
    //         console.log(win);
    //         if ( win === 'T' ) {
    //             messages.textContent = `That's a tie, queen!`
    //             render();
    //             removeEvents();
    //         } else if (win) { 
    //             messages.textContent = `${win} wins the game!`
    //             render();
    //             removeEvents();
    //         } else {
    //             messages.textContent = `It's ${turn}'s turn!`
    //             render();
    //             if(player === "human"){
    //                 ajaxTurn();
    //             }
    //         }
    //     }
    //     else
    //         console.log('Eroare request.status: ' + request.status);
    //     }
    // };
    // request.open('GET', 'getWinner.php?winningCombos='+winningCombos+'&board='+board,true);
    // request.send('');

}
function ajaxTurn(){
    //jquery
    $.ajax({
        url: 'server.php',
        type: 'post',
        data: {board: board},
        success:function(response){
            var index = response;
            //console.log(index);
            //document.getElementById(index).removeEventListener('click', handleTurn);
            board[index] = turn;
            if (turn === 'X') {
                turn = 'O' ;
            } else {
                turn = 'X' ;
            }
            getWinner("pc");
        }
    });
    //pur javascript
    // var request = new XMLHttpRequest();
    // request.onreadystatechange = function() {
    // if (request.readyState == 4) { // cerere rezolvata
    //     if (request.status == 200){ // raspuns Ok
    //         var index = request.responseText;
                // //console.log(index);
                // //document.getElementById(index).removeEventListener('click', handleTurn);
                // board[index] = turn;
                // if (turn === 'X') {
                //     turn = 'O' ;
                // } else {
                //     turn = 'X' ;
                // }
                // getWinner("pc");
    //     }
    //     else
    //         console.log('Eroare request.status: ' + request.status);
    //     }
    // };
    // request.open('GET', 'server.php?board='+board,true);
    // request.send('');

}
// function getWinner() {
//     let winner = null;
//     winningCombos.forEach((combo, index) => {
//         if (board[combo[0]] && board[combo[0]] === board[combo[1]] && board[combo[0]] === board[combo[2]]) {
//             winner = board[combo[0]];
//         }
//     });
//     // new code below
//     if (winner) {
//         return winner 
//     } else if (board.includes('')) {
//         return null // if there's an empty space, return null (no winner yet)
//     } else {
//     return 'T' // no winner and no empty spaces? That's a tie!
//     }
// };
//be sure to call the init function!
init();