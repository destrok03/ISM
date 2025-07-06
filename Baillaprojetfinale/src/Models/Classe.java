package Models;
import java.util.Objects;

public class Classe {
    private static int compteur = 0;
    private  final int idClasse;
    private String libelle;
    private String filiere;
    private Niveau niveau;

    public Classe(String libelle, String filiere, Niveau niveau) {
        this.idClasse = ++compteur;
        this.libelle = libelle;
        this.filiere = filiere;
        this.niveau = niveau;
    }

    public int getIdClasse() { return idClasse; }
    public String getLibelle() { return libelle; }
    public void setLibelle(String libelle) { this.libelle = libelle; }
    public String getFiliere() { return filiere; }
    public void setFiliere(String filiere) { this.filiere = filiere; }
    public Niveau getNiveau() { return niveau; }
    public void setNiveau(Niveau niveau) { this.niveau = niveau; }

    @Override
    public String toString() {
        return "Classe{" +
                "idClasse=" + idClasse +
                ", libelle='" + libelle + '\'' +
                ", filiere='" + filiere + '\'' +
                ", niveau=" + niveau +
                '}';
    }

    public boolean equals(Classe classe) {
        return idClasse == classe.getIdClasse();
    }




}