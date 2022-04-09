describe('Login TestCase', () => {
    it("failed login", () => {

      cy.visit('https://spyke.msstate.wolfgang.space/')
//incorrect credentials from user
      cy.contains('Login').click()
      cy.get('input[name=username]')
      .type('imstupid')
      .should('have.value', 'imstupid')
      cy.get('input[name=password]')
      .type('validPass12')
      .should('have.value', 'validPass12')
      cy.get('form').submit()
      cy.pause()

    })
  })