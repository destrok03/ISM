package Services;

import Models.*;

import java.util.*;

public class StatistiqueService {
    private List<Inscription> inscriptions;
    private List<Classe> classes;
    private List<Etudiant> etudiants;
    private List<Demande> demandes;

    public StatistiqueService(List<Inscription> inscriptions, List<Classe> classes, List<Etudiant> etudiants, List<Demande> demandes) {
        this.inscriptions = inscriptions;
        this.classes = classes;
        this.etudiants = etudiants;
        this.demandes = demandes;
    }

    public int effectifParAnnee(AnneeScolaire annee) {
        int effectif = 0;
        for (Inscription i : inscriptions) {
            if (i.getAnneeScolaire().equals(annee)) {
                effectif++;
            }
        }
        return effectif;
    }

    public Map<String, Integer> effectifFilleGarconParAnnee(AnneeScolaire annee) {
        int nbFilles = 0;
        int nbGarcons = 0;
        for (Inscription i : inscriptions) {
            if (i.getAnneeScolaire().equals(annee)) {
                Etudiant e = findEtudiantByMatricule(i.getMatriculeEtudiant());
                if (e != null) {
                    if (e.getSexe() == Genre.FEMME) nbFilles++;
                    else if (e.getSexe() == Genre.HOMME) nbGarcons++;
                }
            }
        }
        Map<String, Integer> map = new HashMap<>();
        map.put("Fille", nbFilles);
        map.put("Garçon", nbGarcons);
        return map;
    }


    public int effectifParClasse(int idClasse, AnneeScolaire annee) {
        int effectif = 0;
        for (Inscription i : inscriptions) {
            if (i.getIdClasse() == idClasse && i.getAnneeScolaire().equals(annee)) {
                effectif++;
            }
        }
        return effectif;
    }


    public Map<String, Integer> effectifFilleGarconParClasse(int idClasse, AnneeScolaire annee) {
        int nbFilles = 0, nbGarcons = 0;
        for (Inscription i : inscriptions) {
            if (i.getIdClasse() == idClasse && i.getAnneeScolaire().equals(annee)) {
                Etudiant e = findEtudiantByMatricule(i.getMatriculeEtudiant());
                if (e != null) {
                    if (e.getSexe()==Genre.FEMME) nbFilles++;
                    else if (e.getSexe() == Genre.HOMME) nbGarcons++;
                }
            }
        }
        Map<String, Integer> map = new HashMap<>();
        map.put("Fille", nbFilles);
        map.put("Garçon", nbGarcons);
        return map;
    }


    public int nbDemandesSuspenduesOuAnnuleesParAnnee(AnneeScolaire annee) {
        int nb = 0;
        for (Demande d : demandes) {
            Inscription insc = findInscriptionByMatriculeAndAnnee(d.getMatriculeEtudiant(), annee);
            if (insc != null && (d.getType()==TypeDemande.SUSPENSION|| d.getType()==TypeDemande.ANNULATION)) {
                nb++;
            }
        }
        return nb;
    }


    private Etudiant findEtudiantByMatricule(String matricule) {
        for (Etudiant e : etudiants) {
            if (e.getMatricule().equals(matricule)) return e;
        }
        return null;
    }

    private Inscription findInscriptionByMatriculeAndAnnee(String matricule, AnneeScolaire annee) {
        for (Inscription i : inscriptions) {
            if (i.getMatriculeEtudiant().equals(matricule) && i.getAnneeScolaire().equals(annee)) {
                return i;
            }
        }
        return null;
    }
}
