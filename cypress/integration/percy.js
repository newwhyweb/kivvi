describe("Integration test with visual testing", function () {
    it("Loads the component page", function () {
        // Load the page or perform any other interactions with the app.
        cy.visit("https://kivvi.test/components");

        // Take a snapshot for visual diffing
        cy.percySnapshot(["component page"]);
    });
});
