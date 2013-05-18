a)


b)In order to prevent attack B we used a hidden token. In the transfer.php page
 we took the token in the database, hashed that and put it into a hidden input.
When a POST occured, we checked the value of the hidden_token field with the has
h of the database token. If they matched, we allowed the transfer to go though,
otherwise we denied it.


c)



d)



e)
~
