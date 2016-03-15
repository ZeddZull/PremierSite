INSERT INTO Compte VALUES ("Visenya", "Qzdkom486", "chetta.aline@gmail.com", "CHETTA", "Aline", "1992/02/17", "2713/01/01", "Admin");
INSERT INTO Compte VALUES ("ZeddZull", "Fabien13.", "vincentbechu@gmail.com", "BECHU", "Vincent", "1993/02/01", "2713/01/01", "Admin");
INSERT INTO Compte VALUES ("ZeddUser", "Fabien13.", "vincentbechu@gmail.com", "BECHU", "Vincent", "1993/02/01", "2713/01/01", "User");


INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Qui à écrit Kaamelott ?","Kaamelott",'alexandre astier',60);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Qui est le cousin de Lancelot ?","Kaamelott",'bohort',60);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est la botte secrète ?","Kaamelott","c'est pas faux",60);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Qui est Provençale le Gaulois ?","Kaamelott",'perceval le gallois',60);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Combien de pierres possède le château ?","Kaamelott",'16130',60);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le premier nombre premier ?","Nombre premier",'2',60);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le prochain nombre premier après 2711 ?","Nombre premier",'2713',20);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le 42ème nombre premier ?","Nombre premier",'181',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Un corps est-il un groupe ?","Algèbre",'oui',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Un anneau dans lequel on peut trouver des diviseur de 0 est-il un corps ?","Algèbre",'non',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Existe-il un corps composé de fonctions ?","Algèbre",'oui',30);

INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree,Choix1,Choix2,Choix3,Choix4) VALUES ("Combien de mort ont été recencé dans les 4 première saison ?","Game of Thrones",'456',40,"256","2713","42","917");
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est l'expression signifiant : Tous les hommes doivent mourrir ?","Game of Thrones",'valar morghulis',50);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("A quel maison appartient La mère des Dragons ?","Game of Thrones",'targaryen',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree,Choix1,Choix2,Choix3,Choix4) VALUES ("Quel est le nom du loup de Arya Stark ?","Game of Thrones",'nymeria',30,"snoopy","croc blanc","idefix","fantome");
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Qui interpréte Lord Eddard Stark ?","Game of Thrones",'sean bean',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Qui est le roi Fou?","Game of Thrones",'aerys targaryen',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le surnom de Petyr Baelish","Game of Thrones",'littlefinger',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Combien de batard avait le roi Baratheon (Robert) ?","Game of Thrones",'16',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("De quel pays est originaire Syrio Forel ?","Game of Thrones",'braavos',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le nom du dragon noir de Daenerys ?","Game of Thrones",'drogon',30);

INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le nom complet de E.coli","Bactérie et Co",'escherichia coli',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Vrai/Faux : E.coli est-elle une bacille Gram négatif ?","Bactérie et Co",'vrai',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est sa cible ?","Bactérie et Co",'microbiote intestinal',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est la taille de son génome (en Mpb)?","Bactérie et Co",'4.64',30);

INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Définir le Boson de Higgs.","Théorie Physicienne",'particule elementaire',30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Toute transformation d'un système thermodynamique s'effectue avec augmentation de ?","Théorie Physicienne",'entropie',40);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Quel est le premier principe de la Thermodynamique ?","Théorie Physicienne","conservation de l'enerie",30);
INSERT INTO Question(Question,DomaineQuestion,Reponse,Duree) VALUES ("Qui est considéré comme le père de la physique quantique ?","Théorie Physicienne",'planck',30);




INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Spécial Kaamelott",5,"Série","2016-01-01",300);
INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Kaamelott court",3,"Série","2016-01-10",60);
INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Les nombres premiers",3,"Mathématiques","2015-12-25",100);
INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Un peu d'algèbre",3,"Mathématiques","2016-01-16",60);

INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Spécial Game of Thrones",8,"Série","2016-01-19",270);
INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Nôtre Ami E.coli",3,"Biologie","2016-01-19",70);
INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DateDerniereEdition,DureeQ) VALUES ("Une Science?",3,"Physique","2016-01-19",50);




INSERT INTO Theme VALUES ("Série","Kaamelott");
INSERT INTO Theme VALUES ("Mathématiques","Nombre premier");
INSERT INTO Theme VALUES ("Mathématiques","Algèbre");
INSERT INTO Theme VALUES ("Série","Game of Thrones");
INSERT INTO Theme VALUES ("Biologie","Bactérie et Co");
INSERT INTO Theme VALUES ("Physique","Théorie Physicienne");




INSERT INTO FaitPartie VALUES (2,3,0);
INSERT INTO FaitPartie VALUES (2,4,0);
INSERT INTO FaitPartie VALUES (2,1,0);
INSERT INTO FaitPartie VALUES (1,1,0);
INSERT INTO FaitPartie VALUES (1,2,0);
INSERT INTO FaitPartie VALUES (1,3,0);
INSERT INTO FaitPartie VALUES (1,4,0);
INSERT INTO FaitPartie VALUES (1,5,0);
INSERT INTO FaitPartie VALUES (3,6,0);
INSERT INTO FaitPartie VALUES (3,7,0);
INSERT INTO FaitPartie VALUES (3,8,0);
INSERT INTO FaitPartie VALUES (4,9,0);
INSERT INTO FaitPartie VALUES (4,10,0);
INSERT INTO FaitPartie VALUES (4,11,0);

INSERT INTO FaitPartie VALUES (5,1,0);
INSERT INTO FaitPartie VALUES (5,2,0);
INSERT INTO FaitPartie VALUES (5,3,0);
INSERT INTO FaitPartie VALUES (5,4,0);
INSERT INTO FaitPartie VALUES (5,5,0);
INSERT INTO FaitPartie VALUES (5,7,0);
INSERT INTO FaitPartie VALUES (5,9,0);
INSERT INTO FaitPartie VALUES (5,10,0);

INSERT INTO FaitPartie VALUES (6,1,0);
INSERT INTO FaitPartie VALUES (6,3,0);
INSERT INTO FaitPartie VALUES (6,4,0);

INSERT INTO FaitPartie VALUES (7,1,0);
INSERT INTO FaitPartie VALUES (7,2,0);
INSERT INTO FaitPartie VALUES (7,4,0);




INSERT INTO Repondre VALUES (1,"ZeddZull","2015-12-25 16:27:13",5,51);
INSERT INTO Repondre VALUES (2,"ZeddZull","2015-12-26 16:27:13",3,33);
INSERT INTO Repondre VALUES (4,"ZeddZull","2015-12-27 16:27:13",3,27);
INSERT INTO Repondre VALUES (3,"ZeddZull","2015-12-28 16:27:13",3,13);
INSERT INTO Repondre VALUES (3,"ZeddZull","2015-12-28 15:27:13",2,22);
INSERT INTO Repondre VALUES (3,"ZeddZull","2015-12-28 14:27:13",1,34);
INSERT INTO Repondre VALUES (5,"ZeddZull","2015-12-28 10:27:13",6,180);
INSERT INTO Repondre VALUES (7,"ZeddZull","2015-12-28 18:27:13",3,44);

INSERT INTO Repondre VALUES (1,"Visenya","2015-12-25 16:27:13",5,64);
INSERT INTO Repondre VALUES (2,"Visenya","2015-12-26 16:27:13",3,42);
INSERT INTO Repondre VALUES (3,"Visenya","2015-12-27 16:27:13",3,32);
INSERT INTO Repondre VALUES (4,"Visenya","2015-12-28 16:27:13",3,17);