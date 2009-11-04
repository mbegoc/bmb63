<?php 
abstract class Dao
{
        abstract protected function next();
        abstract protected function previous();
        abstract protected function select($listeColonne);
        abstract protected function update($id, $colonne , $value);
		
    	public function connecter() 
    	{
        	echo "connect<br><br>";
        	return oci_new_connect("a8massibe", "ElfireMe1", "titan");
   		}
    	public function deconnecter($connection) 
    	{
        	oci_close($connection);
        	echo "deconnect";
   		}
}