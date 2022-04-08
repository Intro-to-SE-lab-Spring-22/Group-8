describe('RegisterTestCase', () => {
    it("if the user is already register", () => {

      cy.visit('https://spyke.msstate.wolfgang.space/')

      cy.contains('Register here!').click()

      cy.get('input[name=username]')
      .type('valid_userName')
      .should('have.value', 'valid_userName')
      cy.get('input[name=password]')
      .type('validPass12')
      .should('have.value', 'validPass12')
      cy.get('input[name=confirm]')
      .type('validPass12')
      .should('have.value', 'validPass12')
      cy.get('input[name=firstname]')
      .type('TestPes')
      .should('have.value', 'TestPes')
      cy.get('input[name=lastname]')
      .type('LastName')
      .should('have.value', 'LastName')
      cy.get('form').submit()
      cy.pause()

    })
  })