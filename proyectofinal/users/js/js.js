        
        function voting(id){
            console.log(id);

            let info = {
                id_photo: id
            };

            fetch("http://localhost/proyectofinal/users/votes.php", {
                method: 'POST',
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(info)
            })
            .then(response => response.json())
            .then(data => {  
                
                console.log(data);
                
                if(data === 401){
                    alert("Log in to vote for your favorite photo!");
                }

                if(data === 200){
                    alert("Votaste por esta foto");
                    let btn = document.getElementById(id);
                    btn.removeAttribute("onclick");
                    btn.classList.remove("far");
                    btn.classList.add("fas");

                    let votes = document.getElementById("v"+id);
                    let updateVotes = Number(votes.innerText);
                    updateVotes += 1;
                    votes.innerText  = updateVotes;
                }
  
           });
            
        }

        document.addEventListener('DOMContentLoaded', (event) =>{

            console.log("DOM loaded");

        });
