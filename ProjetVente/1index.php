


<form action="1traitement.php" method="post">
   
    <div class="dd-logo"><a href="index.php"><img src="image\IMG1.jpg" width="50px"></a>
    </div>

    <h1>S'IDENTIFIER</h1>
    <label for="login">Nom :</label>
    <input type="text" id="login" name="login" class="entrer"><br><br>
    
    <label for="password">Mot de passe :</label>
    <input type="text" id="password" name="password" required class="entrer"><br><br>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" required class="entrer"><br><br>
    <input type="submit" value="Je m'inscris" class="submit"><p>Vous avez un compte chez Exo'Fruits?<a href="1verif.php">Connectez-vous</a></p>
</form>








<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        }
    form{
        display: flex;
        flex-direction: column;
        border-radius: 30px;
        background-color:#fff;
        width: 30rem;
        height: 35rem;
        align-items: center;
        justify-content: center;
    }
    label{
        font-size: 18px;
        color: #555;
    }
    .entrer{
        width: 20rem;
        height: 3rem;
        outline: none;
    }
    .submit{
        width: 10rem;
        height: 3rem;
        border: none;
        border-radius: 5px;
        background-color: #ff4b5c;
        font-size: 16px;
    }
    .submit:hover{
        background-color: #ff1c34;
    }
    </style>

