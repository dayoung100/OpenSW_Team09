//오늘 날짜 불러오기-필요x
/*var day = new Date();
var dd = day.getDate();
var mm = day.getMonth() + 1; //January is 0!
var yyyy = day.getFullYear();
//var week = new Array('일', '월', '화', '수', '목', '금', '토');


if (dd < 10) {
     dd = '0' + dd;
}
if (mm < 10) {
     mm = '0' + mm;
}
var date = yyyy+"/"+mm + '/' + dd;

const se_date= document.getElementById('selected_day');
var datePart = document.createElement('h1');
var text = document.createTextNode(date);
datePart.appendChild(text);
se_date.appendChild(datePart);*/

//search를 db와 연결중-미완
/*var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'test09',
  password : 'test09',
  database : 'test09'
});
 
connection.connect();
 
connection.query('SELECT * from todo', function (error, results, fields) {
  if (error) console.log(error);
  console.log(results);
});
 
connection.end();*/



//search
const people=[
    {name: 'gohome'},
    {name: 'opensw'},
    {name: 'David'},
    {name: 'Mr.Bob'},
    {name: 'Bob Jr.'}
];


const list= document.getElementById('list');

function setList(group){
    clearList();
    for(const person of group){
        const item= document.createElement('li');
        item.classList.add('list-group-item');
        const text = document.createTextNode(person.name);
        item.appendChild(text);
        list.appendChild(item);
    }
    if(group.length === 0){
        setNoResult();
    }
}

function clearList(){
    while(list.hasChildNodes()){
        list.removeChild(list.firstChild);
    }
}

function setNoResult(){
    const item = document.createElement('li');
    item.classList.add('list-group-item');
    const text = document.createTextNode('No reults found');
    item.appendChild(text);
    list.appendChild(item);
}

function computeRelevancy(name, searchTerm){
    let value = name.trim().toLowerCase();
    if(value === searchTerm){
        return 2;
    }else if(value.startsWith(searchTerm)){
        return 1;
    }else if(value.includes(searchTerm)){
        return 0;
    }else{
        return -1;
    }
}

const searchInput = document.getElementById('search')
searchInput.addEventListener('input', (event)=>{
    let value = event.target.value;
    if(value && value.trim().length > 0){
        value = value.trim().toLowerCase();
        setList(people.filter(person => {
            return person.name.toLowerCase().includes(value);
        }).sort((person1, person2) => {
            return computeRelevancy(person2.name, value) -computeRelevancy(person1.name, value);
        }));
    }else{
        clearList();
    }
})