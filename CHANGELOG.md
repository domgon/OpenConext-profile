# Next release

#Next
 * Upgrade Stepup-saml-bundle to version 4.1.8 #139

# 2.0.2

**Changes**

 * Optimize ORCiD button placement for all devices #136
 * Add ECK ID saml attribute translation #133
 * Fix the data retention translation #134

# 2.0.1
**Changes**

* Add /build to asset paths #131
* Bump Stepup SAML bundle to 4.1.5 #132

# 2.0.0

Version 2.0 drops PHP 5.6 support. And more important Symfony was updated to version 3.4

The major changes of this version:

**Improvements**
* Upgrade to Symfony 3.4 and fix deprecation issues while at it #126
* Added Portuguese translations #121 
* Update ORCiD ID styling on the my connections page #128
* Install and configure Webpack Encore #130

**Maintenance**
* Bump Stepup SAML bundle to version 4.1.4 #125
* Install PHP 7.2 and update Composer dependencies #124
* Address security issues #127

# 1.2.2

Further removes the SURFconextId usages in the project. The AA Api client still used the attribute, causing issues on the My connections page. Thanks @domgon for raising the issue!

**Bugfix**
* Stop using SurfConextId in the AA client #118 
* Add Portuguese language support #119 (Thanks @domgon!) #120

**Maintenance**
 * Install Symfony and Twig security updates #119
 * Removed RMT from the project
 * Updated documentation links
 * Upgraded Security Checker to version 5

# 1.2.1

In order to be compatible with EngineBlock 5.9, Profile needed to stop using the SURFconextId. As Engine no longer releases it.

**Bugfix**
* Stop using SURFconextId as user identifier #114 

**Maintenance**
* Security updates #113

# Old releases

## VERSION 1  OPENCONEXT PROFILE
### Version 1.2 - Provide User Lifecycle support
#### 22/01.2019 15:38  1.2.0  initial release

### Version 1.1 - Various improvements to the 'My services' and 'My connections' pages
#### 24/05/2018 10:00  1.1.1  Allow service providers without NameIDFormat
#### 07/03/2018 10:00  1.1.0  SSO improvements, allow IDPs without contacts and better error templates

### Version 1.0 - Various improvements to the 'My services' and 'My connections' pages
#### 06/03/2018 12:23  1.0.3  Security patches for https://simplesamlphp.org/security/201803-01
#### 05/02/2018 12:23  1.0.2  Security patches for simplesamlphp/saml2 and paragonie/random_compat
#### 05/02/2018 12:23  1.0.1  SAML2 library upgrade and EB 5.5 compatibility changes
#### 15/01/2018 10:00  1.0.0  initial release


## VERSION 0  FIRST PRE-RELEASE OF PROFILE APPLICATION EXTRACTED FROM ENGINEBLOCK

### Version 0.6 - Changed consumption of EB Consent API due to changes in EB 5.2
#### 14/02/2017 13:46  0.6.0  initial release

### Version 0.5 - Apply ARP to attributes in My Services, requires EB >= 5.1
#### 03/11/2016 09:53  0.5.1  This patch fixes issues when applying the ARP to attributes without a definition known to Profile.
#### 01/11/2016 13:16  0.5.0  initial release

### Version 0.4 - Update Profile with improvements
#### 24/10/2016 13:11  0.4.0  initial release

### Version 0.3 - Made locale cookie more configurable, fixed dealing with mattribute multiplicity, corrected development ip for engineblock
#### 14/06/2016 10:58  0.3.0  initial release

### Version 0.2 - Added script to aid with deployment of tar-balls
#### 03/06/2016 10:06  0.2.0  initial release

### Version 0.1 - First pre-release of Profile application extracted from EngineBlock
#### 31/12/2015 13:51  0.1.0  initial release
