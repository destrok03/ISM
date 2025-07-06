package Services;

import Models.Demande;
import Models.TypeDemande;
import Models.TypeEtat;
import java.util.*;

public class DemandeService {
    private List<Demande> demandes = new ArrayList<>();
    public DemandeService(List<Demande> demandes) {
        this.demandes= demandes;
    }
    
    public void creerDemande(String matriculeEtudiant, TypeDemande type, String motif) {
        Demande d = new Demande(matriculeEtudiant, type, motif, TypeEtat.EN_ATTENTE);
        demandes.add(d);
    }


    public List<Demande> listerDemandesParMatricule(String matricule) {
        List<Demande> resultat = new ArrayList<>();
        for (Demande d : demandes) {
            if (d.getMatriculeEtudiant().equals(matricule)) {
                resultat.add(d);
            }
        }
        return resultat;
    }


    public List<Demande> listerDemandesParMatriculeEtEtat(String matricule, TypeEtat etat) {
        List<Demande> resultat = new ArrayList<>();
        for (Demande d : demandes) {
            if (d.getMatriculeEtudiant().equals(matricule) && d.getEtat() == etat) {
                resultat.add(d);
            }
        }
        return resultat;
    }

    public boolean traiterDemande(int idDemande, TypeEtat nouvelEtat) {
        for (Demande d : demandes) {
            if (d.getIdDemande() == idDemande) {
                d.setEtat(nouvelEtat);
                return true;
            }
        }
        return false;
    }
    public List<Demande> listerToutesLesDemandes() {
        return demandes;
    }
}
