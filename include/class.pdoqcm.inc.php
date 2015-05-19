<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application QCM
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoQCM qui contiendra l'unique instance de la classe
 
 * @package default
 * @author OLIVIER Thomas
 * @version    1.1
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoQcm{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=quizissimo';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
	private static $monPdo;
	private static $monPdoQcm=null;
        
        
/**
 * 
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoQcm::$monPdo = new PDO(PdoQcm::$serveur.';'.PdoQcm::$bdd, PdoQcm::$user, PdoQcm::$mdp); 
		PdoQcm::$monPdo->query("SET CHARACTER SET utf8");
	}
        
                
	public function _destruct(){
		PdoQcm::$monPdo = null;
	}
	
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoQcm = PdoQcm::getPdoQcm();
 
 * @return l'unique objet de la classe PdoQcm
 */
	public  static function getPdoQcm(){
		if(PdoQcm::$monPdoQcm==null){
			PdoQcm::$monPdoQcm= new PdoQcm();
		}
		return PdoQcm::$monPdoQcm;  
	}
	
/**
 * Retourne les informations d'un utilisateur
 
 * @param $login 
 * @param $mdp
 * @return l'id, le nom, le prénom et le niveau sous la forme d'un tableau associatif 
*/
	public function getInfosUtilisateur($login, $mdp){
		$req = "SELECT utilisateur.idUtilisateur as id, utilisateur.nom as nom, utilisateur.prenom as prenom , typeUtilisateur.libelle as libelleFonc
					FROM utilisateur,typeUtilisateur
					WHERE utilisateur.typeUtilisateur = typeUtilisateur.codeTypeUtilisateur
					AND utilisateur.identifiant= :login 
					AND utilisateur.mdp= :mdp";
		$req_prepare = PdoQcm::$monPdo -> prepare($req);
		$req_prepare->bindParam(':login', $login, PDO::PARAM_STR);
		$req_prepare->bindParam(':mdp', $mdp, PDO::PARAM_STR);
		$req_prepare->execute();
		$ligne = $req_prepare->fetch();
		return $ligne;
	}
	
    /**
     * Retourne un utilisateur en fonction de l'id
     * 
     * @param $idUtilisateur
     * @return le utilisateur correspondant à l'id
     */
    public function getUtilisateur($idUtilisateur) {
        $sql = "SELECT * FROM utilisateur WHERE id = :idUtilisateur";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('idUtilisateur' => $idUtilisateur));
        $laLigne = $req->fetch();
        
        return $laLigne;
    }
    
    
    
    /** 
     * Retourne la liste des utilisateurs
     * 
     * @return tableau associatif
     */
    public function getLesUtilisateurs() {
        $sql = "SELECT utilisateur.id, utilisateur.nom, utilisateur.prenom 
                FROM utilisateur 
                WHERE utilisateur.id = fonction.id
                AND intitule_fonc.fonction = fonction.fonction
                WHERE intitule_fonc.libellefonc = 'utilisateur'";
        $ligneResultat = PdoQcm::$monPdo->query($sql);
        return $ligneResultat;

    }
    
    
    
    
    
    
    
        /**
     * OLIVIER Thomas
     * Retourne sous forme d'un tableau associatif tous les thèmes
     * concernées par les deux arguments

     * La boucle foreach ne peut être utilisée ici car on procède
     * à une modification de la structure itérée - transformation du champ date-

     * @param $identifiant
     * @param $libelle
     * @return tous les champs des lignes de themes sous la forme d'un tableau associatif 
    */
    public function getLesThemes($identifiant,$libelle) {
        $sql = "SELECT * FROM theme";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant, 'libelle' => $libelle));
        $lesLignes = $req->fetchAll();
        $req->closeCursor();

        
        return $lesLignes;
    }
    
    
    
    
            /**
     * OLIVIER Thomas
     * Retourne sous forme d'un tableau associatif tous les QCM
     * concernées par le thème

     * La boucle foreach ne peut être utilisée ici car on procède
     * à une modification de la structure itérée - transformation du champ date-

     * @param $identifiant
     * @param $libelle
     * @return tous les champs des lignes de QCM sous la forme d'un tableau associatif 
    */
    public function getLesQcm($identifiant,$libelle,$idTheme) {
        $sql = "SELECT * FROM qcm";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant, 'libelle' => $libelle, 'idTheme' => $idTheme));
        $lesLignes = $req->fetchAll();
        $req->closeCursor();

        
        return $lesLignes;
    }
    
    
    
    
           /**
     * OLIVIER Thomas
     * Retourne sous forme d'un tableau associatif toutes les questions
     * concernées par le QCM

     * La boucle foreach ne peut être utilisée ici car on procède
     * à une modification de la structure itérée - transformation du champ date-

     * @param $identifiant
     * @param $libelle
     * @return tous les champs des lignes de QCM sous la forme d'un tableau associatif 
    */
    public function getLesQuestions($identifiant,$libelle,$idQcm) {
        $sql = "SELECT * FROM question";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant, 'libelle' => $libelle, 'idQcm' => $idQcm));
        $lesLignes = $req->fetchAll();
        $req->closeCursor();

        
        return $lesLignes;
    }
    
    
       /**
     * OLIVIER Thomas
     * Retourne sous forme d'un tableau associatif toutes les questions
     * concernées par le QCM

     * La boucle foreach ne peut être utilisée ici car on procède
     * à une modification de la structure itérée - transformation du champ date-

     * @param $identifiant
     * @param $libelle
     * @return tous les champs des lignes de QCM sous la forme d'un tableau associatif 
    */
    public function getLesReponses($identifiant,$libelle,$idQuestion) {
        $sql = "SELECT * FROM reponse";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant, 'libelle' => $libelle, 'idQuestion' => $idQuestion));
        $lesLignes = $req->fetchAll();
        $req->closeCursor();

        
        return $lesLignes;
    }
    
    
    
    
    
   
    
    
    
    /*
     * Met à jour la table ligneFraisHorsForfait
     * 
     * Met à jour la table ligneFraisHorsForfait pour l'id passé en paramètre
     * en enregistrant les nouvelles informations
     * 
     * @param hfId
     * @param hfLib
     * 
     */
    public function majTheme($hfLib, $hfid) {
        $sql = "UPDATE theme SET libelle = :hfLib WHERE identifiant = :hfId";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('hfLib' => $hfLib, 'hfId' => $hfId));
        $req->closeCursor();
    }
    
    
    
   
    
    

    
    /**
     * Crée un nouveau Theme
     * à partir des informations fournies en paramètre

     * @param $libelle : le libelle du frais
    */
    public function creeNouveauTheme($libelle) {
        $sql = "INSERT INTO theme VALUES('', :libelle)";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('libelle' => $libelle));
        $req->closeCursor();
    }
    
    
    
    /**
     * Supprime le thème avec l'identifiant passé en argument, la requete supprime
     * aussi tous les QCM qui le concerne ainsi que les questions et réponses

     * @param $identifiant
    */
    public function supprimerTheme ($identifiant) {
        $sql = "DELETE FROM theme WHERE identifiant = :identifiant";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant));
        $req->closeCursor();
    }
    
    
    public function supprimerQcm ($identifiant) {
        $sql = "DELETE FROM qcm WHERE identifiant = :identifiant";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant));
        $req->closeCursor();
    }
    
    
    public function supprimerQuestion ($identifiant) {
        $sql = "DELETE FROM question WHERE identifiant = :identifiant";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant));
        $req->closeCursor();
    }
    
    
        public function supprimerReponse ($identifiant) {
        $sql = "DELETE FROM reponse WHERE identifiant = :identifiant";
        $req = PdoQcm::$monPdo->prepare($sql);
        $req->execute(array('identifiant' => $identifiant));
        $req->closeCursor();
    }
  
	 
	 
    /**
     * 
     */
    public function majMontantValide($idUtilisateur, $mois, $montant){
        $req = "update fichefrais set montantvalide = " . $montant . " where idutilisateur = '" . $idUtilisateur . "' and mois = '" . $mois . "'";
        PdoQcm::$monPdo->exec($req);
    }
    
    /**
     * 
     */
    public function getMontantHorsForfait($idUtilisateur, $mois){
        $req = "select sum(montant) from lignefraishorsforfait where idutilisateur = '" . $idUtilisateur . "' and mois = '" . $mois . "'";
        $ligneResultat = PdoQcm::$monPdo->query($req);
        $fetch = $ligneResultat->fetch();
        return $fetch;
    }
    
    /**
     * 
     */
    public function dropUtilisateur($idUtilisateur){
        $req = "delete from utilisateur where id = '" . $idUtilisateur . "'";
        PdoQcm::$monPdo->exec($req);
    }
    
    /**
     * 
     */
    public function getLeUtilisateur($idUtilisateur){
        $req = "select * from utilisateur where id = '" . $idUtilisateur . "'";
        $resultat = PdoQcm::$monPdo->query($req);
        $fetch = $resultat->fetch();
        return $fetch;
    }
    
    /**
     * 
     */
    public function validerUpdateUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur){
        $req = "update utilisateur set nom = '" . $nomUtilisateur . "', prenom = '" . $prenomUtilisateur . "' where id='" . $idUtilisateur . "'";
        PdoQcm::$monPdo->exec($req);
    }
    
    /**
     * 
     */
    public function insertUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $loginUtilisateur, $mdpUtilisateur, $adresseUtilisateur, 
            $cpUtilisateur, $villeUtilisateur, $dateEmbaucheUtilisateur){
        $req = "insert into utilisateur values('" . $idUtilisateur . "', '" . $nomUtilisateur . "', '" .$prenomUtilisateur."', " . 
                $loginUtilisateur . "', '" . $mdpUtilisateur . "', '" . $adresseUtilisateur . "', '" . $cpUtilisateur . "', '" . 
                $villeUtilisateur . "', '" . $dateEmbaucheUtilisateur."')";
        echo $req;
    }

	
	
	
	
	  /**
     * Retourne la requête récupérant les mois disponibles pour un visiteur
     * 
     * Retourne une requête différente selon le status demandé (toutes, validées ou cloturées)
     * @param type $idVisiteur
     * @param type $status
     * @return type
     */
    public function getReqResultatQuestion($idVisiteur) {
            $sql = "SELECT date FROM score WHERE idUtilisateur = :idVisiteur ORDER BY date DESC";
            $req = PdoQcm::$monPdo->prepare($sql);
            $req->execute(array('idVisiteur' => $idVisiteur));
        
        return $req;
    }
    
    /**
     * Retourne les mois pour lesquel un visiteur a une fiche de frais

     * @param $idVisiteur 
     * @param $status types de fiches à récupérer. Peut prendre comme valeur "toutes", "validees", "cloturees"
     * @return un tableau associatif de clé un mois -aaaamm- et de valeurs l'année et le mois correspondant 
    */
    public function getResultatQuestion($idVisiteur) {
        $req = $this->getReqResultatQuestion($idVisiteur);
        
        $lesMois = array();
        $laLigne = $req->fetch();
        while($laLigne != null)	{
            $mois = $laLigne['date'];
            $laLigne = $req->fetch(); 		
        }
        $req->closeCursor();
        
        return $lesMois;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getResultatFormateur()
		{
		}
}
?>