package Models;

public class Etudiant extends Utilisateur {
    private String matricule;
    private int idClasse;

    public Etudiant(String nomComplet, String adresse, String login, String motDePasse, String matricule, int idClasse,Genre sexe) {
        super(nomComplet, adresse, login, motDePasse, TypeRole.ETUDIANT,sexe);
        this.matricule = matricule;
        this.idClasse = idClasse;
    }

    public String getMatricule() { return matricule; }
    public void setMatricule(String matricule) { this.matricule = matricule; }

    public int getIdClasse() { return idClasse; }
    public void setIdClasse(int idClasse) { this.idClasse = idClasse; }

    @Override
    public String toString() {
        return super.toString() + " | Matricule: " + matricule + " | Classe: " + idClasse;
    }
}
