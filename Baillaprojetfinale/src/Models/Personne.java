package Models;
import java.util.Objects;

public abstract class Personne {
    private int id;
    protected String nomComplet;
    protected String adresse;
    protected TypeRole role;
    protected  Genre sexe;
    private static  int nbrePersonne=0;
    protected Personne(String nomComplet, String adresse, TypeRole role,Genre sexe) {
        this.id = nbrePersonne++;
        this.nomComplet = nomComplet;
        this.adresse = adresse;
        this.role = role;
        this.sexe= sexe;
    }

    public int getId() {
        return id;
    }

    public String getNomComplet() {
        return nomComplet;
    }

    public void setNomComplet(String nomComplet) {
        this.nomComplet = nomComplet;
    }

    public String getAdresse() {
        return adresse;
    }

    public void setAdresse(String adresse) {
        this.adresse = adresse;
    }

    public TypeRole getRole() {
        return role;
    }

    public Genre getSexe() {
        return sexe;
    }

    @Override
    public String toString() {
        return "Personne{" +
                "id=" + id +
                ", nomComplet='" + nomComplet + '\'' +
                ", adresse='" + adresse + '\'' +
                ", role=" + role +
                ", sexe=" + sexe +
                '}';
    }


}
