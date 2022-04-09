describe('Login TestCase', () => {
    it("failed login2", () => {

      cy.visit('https://spyke.msstate.wolfgang.space/')
//Puts in sets of short login credentials 
      cy.contains('Login').click()
      cy.get('input[name=username]')
      .type('1')
      .should('have.value', '1')
      cy.get('input[name=password]')
      .type('1')
      .should('have.value', '1')
      cy.get('form').submit()
      cy.pause()

    })
  })