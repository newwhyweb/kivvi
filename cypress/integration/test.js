describe("Test", function () {
    it("Visits page", function () {
        cy.visit("https://kivvi.test/components");
        cy.get(".kivvi-card-info")
            .find("h3")
            .then((rows) => {
                expect(rows).to.have.length(1);
            });
    });
});
