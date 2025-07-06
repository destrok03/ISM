package Models;

public class AnneeScolaire {
    private static int compteur = 0;
    private final int idAnnee;
    private  String libelle;


    public AnneeScolaire() {
        this.idAnnee = compteur++;

    }

    public String getLibelle() {
        return libelle;
    }

    public int getIdAnnee() {
        return idAnnee;
    }
    public void setLibelle(String libelle) { this.libelle = libelle; }

    @Override
    public String toString() {
        return "AnneeScolaire{" +
                "idAnnee=" + idAnnee +
                ", libelle='" + libelle + '\'' +
                '}';
    }
}
