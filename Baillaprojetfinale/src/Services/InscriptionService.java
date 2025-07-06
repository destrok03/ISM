package Services;

import Models.Classe;
import Models.Inscription;
import java.util.*;

public class InscriptionService {
    private List<Inscription> inscriptions = new ArrayList<>();
    public InscriptionService(List<Inscription> inscriptions) {
        this.inscriptions = inscriptions;
    }
    public boolean ajouterInscription(Inscription i) {
        for (Inscription insc : inscriptions) {
            if (insc.getMatriculeEtudiant().equals(i.getMatriculeEtudiant())
                    && insc.getAnneeScolaire().equals(i.getAnneeScolaire())) {
                return false;
            }
        }
        inscriptions.add(i);
        return true;
    }

    public List<Inscription> listerInscriptions() {
        return inscriptions;
    }

    public List<Inscription> listerInscriptionsParClasseEtAnnee(int idClasse, String annee) {
        List<Inscription> resultat = new ArrayList<>();
        for (Inscription insc : inscriptions) {
            if ((insc.getIdClasse()==idClasse) && insc.getAnneeScolaire().equals(annee)) {
                resultat.add(insc);
            }
        }
        return resultat;
    }
}
