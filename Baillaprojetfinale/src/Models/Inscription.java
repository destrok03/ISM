package Models;

public class Inscription {
    private static int nbreinscrit = 0;
    private final int idInscription;
    private final String matriculeEtudiant;
    private final int idClasse; // préférer String si l'id classe est alphanumérique (ex : "CL2")
    private final AnneeScolaire anneeScolaire;
    private final TypeInscription typeInscription;

    // Constructeur complet : force la saisie de toutes les infos
    public Inscription(String matriculeEtudiant, int idClasse, AnneeScolaire anneeScolaire, TypeInscription typeInscription) {
        this.idInscription = ++nbreinscrit;
        this.matriculeEtudiant = matriculeEtudiant;
        this.idClasse = idClasse;
        this.anneeScolaire = anneeScolaire;
        this.typeInscription = typeInscription;
    }

    public int getIdInscription() {
        return idInscription;
    }
    public String getMatriculeEtudiant() {
        return matriculeEtudiant;
    }
    public int getIdClasse() {
        return idClasse;
    }
    public AnneeScolaire getAnneeScolaire() {
        return anneeScolaire;
    }
    public TypeInscription getTypeInscription() {
        return typeInscription;
    }

    @Override
    public String toString() {
        return "Inscription{" +
                "idInscription=" + idInscription +
                ", matriculeEtudiant='" + matriculeEtudiant + '\'' +
                ", idClasse='" + idClasse + '\'' +
                ", anneeScolaire=" + anneeScolaire +
                ", typeInscription=" + typeInscription +
                '}';
    }
}
