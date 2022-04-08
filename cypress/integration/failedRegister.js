describe('RegisterTestcase', () => {
    it("incorrect inputs from user", () => {

      cy.visit('https://spyke.msstate.wolfgang.space/')


      cy.contains('Register here!').click()

      cy.get('input[name=username]')
      .type('123')
      .should('have.value', '123')
      cy.get('input[name=password]')
      .type('12')
      .should('have.value', '12')
      cy.get('input[name=confirm]')
      .type('123')
      .should('have.value', '123')
      cy.get('input[name=firstname]')
      .type('123')
      .should('have.value', '123')
      cy.get('input[name=lastname]')
      .type('123')
      .should('have.value', '123')
      cy.get('form').submit()
      cy.pause()

    })
  })