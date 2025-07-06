package Services;

import Models.Etudiant;
import java.util.*;

public class EtudiantService {
    private Map<String, Etudiant> etudiants = new HashMap<>();
    public EtudiantService(List<Etudiant> etudiants) {
        for (Etudiant e : etudiants) {
            this.etudiants.put(e.getMatricule(), e);
        }
    }
    /*public EtudiantService(List<Etudiant> etudiants) {
         //this.etudiants=etudiants;
    }*/
        public boolean ajouterEtudiant(Etudiant e) {
        if (etudiants.containsKey(e.getMatricule())) return false;
        etudiants.put(e.getMatricule(), e);
        return true;
    }

    public List<Etudiant> listerEtudiants() {
        return new ArrayList<>(etudiants.values());
    }

    public Etudiant chercherParMatricule(String matricule) {
        return etudiants.get(matricule);
    }

    public List<Etudiant> listerEtudiantsParClasseEtAnnee(int idClasse, String anneeScolaire, List<Models.Inscription> inscriptions) {
        List<Etudiant> resultat = new ArrayList<>();
        for (Models.Inscription insc : inscriptions) {
            if ((insc.getIdClasse()== idClasse) && insc.getAnneeScolaire().equals(anneeScolaire)) {
                Etudiant etu = chercherParMatricule(insc.getMatriculeEtudiant());
                if (etu != null) resultat.add(etu);
            }
        }
        return resultat;
    }
}
