package Models;

import java.time.LocalDate;

public class Demande {
    private static int nbredemande = 0;
    private final int idDemande;
    private final String matriculeEtudiant;
    private final  TypeDemande type; // "suspension" ou "annulation"
    private final String motif;
    private final LocalDate dateDemande;
    private TypeEtat etat;

    // Constructeur complet : tout est saisi sauf id/date générés auto
    public Demande(String matriculeEtudiant, TypeDemande type, String motif, TypeEtat etat) {
        nbredemande++;
        this.idDemande = nbredemande;
        this.matriculeEtudiant = matriculeEtudiant;
        this.type = type;
        this.motif = motif;
        this.dateDemande = LocalDate.now();
        this.etat = etat;
    }

    // Getters (pas de setters pour les champs "fixes", sauf pour l'état)
    public int getIdDemande() { return idDemande; }
    public String getMatriculeEtudiant() { return matriculeEtudiant; }
    public TypeDemande getType() { return type; }
    public String getMotif() { return motif; }
    public LocalDate getDateDemande() { return dateDemande; }
    public TypeEtat getEtat() { return etat; }
    public void setEtat(TypeEtat etat) { this.etat = etat; }

    @Override
    public String toString() {
        return "Demande{" +
                "idDemande=" + idDemande +
                ", matriculeEtudiant='" + matriculeEtudiant + '\'' +
                ", type='" + type + '\'' +
                ", motif='" + motif + '\'' +
                ", dateDemande=" + dateDemande +
                ", etat=" + etat +
                '}';
    }
}
