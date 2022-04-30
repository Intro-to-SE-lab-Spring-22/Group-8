describe('test to see if we can view the post', () => {
    it("testing the post feature ", () => {

      cy.visit('https://spyke.msstate.wolfgang.space/')
//Puts in sets of short login credentials 
      cy.contains('Login').click()
      cy.get('input[name=username]')
      .type('valid_userName')
      .should('have.value', 'valid_userName')
      cy.get('input[name=password]')
      .type('validPass12')
      .should('have.value', 'validPass12')
      cy.get('form').submit()

      

    })
  })