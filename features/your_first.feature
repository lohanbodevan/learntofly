Feature: Verify if size of imagem is less then 700kb

	Scenario: Successfully describing scenario
		Given file is in directory
		And file size is less then 700kb
		When I do "filesize()"
		Then I should get:
		"""
		file size less then 700kb
		"""
