<form method="post" action="/user/create_user">

		<div class=left>
			<label for="pseudo">Pseudo :</label>
		</div>
		<div class=right>
			<input type="text" name="pseudo" id="pseudo" class="signup" autofocus/>
		</div>
        
		<br />
		<div class=left>
			<label for="pass">Mot de passe :</label>
		</div>
		<div class=right>
			<input type="password" name="pass" id="pass" class="signup" required/>
		</div>
		
		<br />
		<div class=left>
			<label for="confirm_pass">Confirmer mot de passe :</label>
		</div>
		<div class=right>
			<input type="password" name="confirm_pass" id="confirm_pass" class="signup" required/>
		</div>

		<br />
		<div class=left>
			<label for="prenom">Prénom :</label>
		</div>
		<div class=right>
			<input type="text" name="prenom" id="prenom" class="signup"/>
		</div>
			
		<br />
		<div class=left>
			<label for="nom">Nom :</label>
		</div>
		<div class=right>
			<input type="text" name="nom" id="nom" class="signup"/>
		</div>

		<br />
		<div class=left>
			<label for="mail">Mail :</label>
		</div>
		<div class=right>
			<input type="email" name="mail" id="mail" required/>
		</div>

		<br />
<div class=left>
			<label for="phone">Téléphone :</label>
		</div>
		<div class=right>
			<input type="tel" name="phone" id="phone" />
		</div>

		<br />
<div class=left>
			<label for="adress">Adresse :</label>
		</div>
		<div class=right>
			<input type="text" name="adress" id="adress" />
		</div>

		<br />
<div class=left>
			<label for="city">Ville :</label>
		</div>
		<div class=right>
			<input type="text" name="city" id="city" />
		</div>

		<br />
<div class=left>
			<label for="birthday">Date de naissance :</label>
		</div>
		<div class=right>
			<input type="date" name="birthday" id="birthday" />
		</div>
		
		<br />
		<div>
			<input type="submit" value="Envoyer" class=button_wooden/>
		</div>
        
</form>