package Services;

import Models.Enseignement;
import java.util.*;

public class EnseignementService {
    private List<Enseignement> enseignements = new ArrayList<>();

    public void ajouterEnseignement(Enseignement e) {
        enseignements.add(e);
    }

    public List<Enseignement> listerEnseignements() {
        return enseignements;
    }

    
    public List<Enseignement> listerParProf(int idProf) {
        List<Enseignement> resultat = new ArrayList<>();
        for (Enseignement e : enseignements) {
            if (e.getIdProf() == idProf) resultat.add(e);
        }
        return resultat;
    }

    
    public List<Enseignement> listerParClasse(int idClasse) {
        List<Enseignement> resultat = new ArrayList<>();
        for (Enseignement e : enseignements) {
            if (e.getIdClasse() == idClasse) resultat.add(e);
        }
        return resultat;
    }

    public List<Enseignement> listerParModule(int idModule) {
        List<Enseignement> resultat = new ArrayList<>();
        for (Enseignement e : enseignements) {
            if (e.getIdModule() == idModule) resultat.add(e);
        }
        return resultat;
    }
}
