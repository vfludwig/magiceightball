var answers = ["It is certain", 
                "It is decidedly so", 
                "Without a doubt", 
                "Yes - definitely",
                "You may rely on it", 
                "As I see it, yes", 
                "Most likely", 
                "Outlook good", 
                "Yes", "Signs point to yes",
                "Don't count on it", 
                "My reply is no",
                "My sources say no", 
                "Outlook not so good",
                "Very doubtful", 
                "Reply hazy, try again", 
                "Ask again later", 
                "Better not tell you now",
                "Cannot predict now", 
                "Concentrate and ask again"];

window.onload = function() {
    var eight = document.getElementById("eight");
    var answer = document.getElementById("answer");
    var eightball = document.getElementById("eight-ball");
    var question = document.getElementById("question");
    
    eightball.addEventListener("click", function() {
        if (question.value.length < 1) {
        alert('Enter a question!');
        } else {
        eight.innerText = "";
        var num = Math.floor(Math.random() * Math.floor(answers.length));
        answer.innerText = answers[num];

        var my_time = new Date();
        document.getElementById('display').innerHTML=my_time
        alert('question: ' + question.value + ', answer: ' + answer.innerText+ ', time: ' + my_time);
        }
    });
};

/* above code from https://medium.com/swlh/creating-a-magic-8-ball-in-html5-with-javascript-40df2a0c6efb */
