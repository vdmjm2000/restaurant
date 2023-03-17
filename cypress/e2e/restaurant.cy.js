describe("template spec restaurant", () => {
  it("selection authentification", () => {
    cy.visit("http://localhost/restaurant/index.php");
    cy.get(".container > .btn-book-a-table").click();
    cy.get("#pseudo").click({ force: true });
    cy.get("#pseudo").type("pp");
    cy.get("#mdp").click({ force: true });
    cy.get("#mdp").type("mm");
    cy.get('#submit_login').click({ force: true });

  });
});

describe("template spec profile.php", () => {
  it("Affichage et vérification page profile ", () => {
    cy.visit("http://localhost/restaurant/index.php");
    cy.get(".container > .btn-book-a-table").click();
    cy.get("#pseudo").click({ force: true });
    cy.get("#pseudo").type("pp");
    cy.get("#mdp").click({ force: true });
    cy.get("#mdp").type("mm");
    cy.get('#submit_login').click({ force: true });

  });
});


//Ignore l'erreur par une exception
Cypress.on("uncaught:exception", (err, runnable) => {
  // returning false here prevents Cypress from
  // failing the test
  return false;
});
