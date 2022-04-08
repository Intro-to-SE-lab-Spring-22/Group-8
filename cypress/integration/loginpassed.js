describe('Login TestCase', () => {
    it("Successful login", () => {

      cy.visit('https://spyke.msstate.wolfgang.space/')

      cy.contains('Login').click()
      cy.get('input[name=username]')
      .type('valid_userName')
      .should('have.value', 'valid_userName')
      cy.get('input[name=password]')
      .type('validPass12')
      .should('have.value', 'validPass12')
      cy.get('form').submit()
      cy.pause()

    })
  })