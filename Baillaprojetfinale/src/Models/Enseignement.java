package Models;

public class Enseignement {
    private static int compteur = 0;
    private final int idEnseignement;
    private final int idProf;
    private final int idClasse;
    private final int idModule;

    // Constructeur
    public Enseignement(int idProf, int idClasse, int idModule) {
        this.idEnseignement = ++compteur;
        this.idProf = idProf;
        this.idClasse = idClasse;
        this.idModule = idModule;
    }

    public int getIdEnseignement() {
        return idEnseignement;
    }

    public int getIdProf() {
        return idProf;
    }

    public int getIdClasse() {
        return idClasse;
    }

    public int getIdModule() {
        return idModule;
    }

    @Override
    public String toString() {
        return "Enseignement{" +
                "idEnseignement=" + idEnseignement +
                ", idProf=" + idProf +
                ", idClasse=" + idClasse +
                ", idModule=" + idModule +
                '}';
    }
}
