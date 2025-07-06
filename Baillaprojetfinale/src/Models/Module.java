package Models;

public class Module {
    private static int nbremodule = 0;
    private final int idModule;
    private String nom;
    private int nbHeures;

    // Constructeur complet (oblige à donner nom et nbHeures)
    public Module(String nom, int nbHeures) {
        this.idModule = ++nbremodule; // commence à 1
        this.nom = nom;
        this.nbHeures = nbHeures;
    }

    public String getNom() {
        return nom;
    }
    public void setNom(String nom) {
        this.nom = nom;
    }

    public int getNbHeures() {
        return nbHeures;
    }
    public void setNbHeures(int nbHeures) {
        this.nbHeures = nbHeures;
    }

    public int getIdModule() {
        return idModule;
    }

    @Override
    public String toString() {
        return "Module{" +
                "idModule=" + idModule +
                ", nom='" + nom + '\'' +
                ", nbHeures=" + nbHeures +
                '}';
    }
}
