<?php
/**
 * @author Georg Ehrke <oc.list@georgehrke.com>
 *
 * @copyright Copyright (c) 2017 Georg Ehrke <oc.list@georgehrke.com>
 * @license GNU AGPL version 3 or any later version
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\DAV\CalDAV\Search\Xml\Filter;

use Sabre\DAV\Exception\BadRequest;
use Sabre\Xml\Reader;
use Sabre\Xml\XmlDeserializable;
use OCA\DAV\CalDAV\Search\SearchPlugin;

class CompFilter implements XmlDeserializable {

	/**
	 * @param Reader $reader
	 * @throws BadRequest
	 * @return string
	 */
	static function xmlDeserialize(Reader $reader) {
		$att = $reader->parseAttributes();
		$componentName = $att['name'];

		$reader->parseInnerTree();

		if (!is_string($componentName)) {
			throw new BadRequest('The {' . SearchPlugin::NS_Nextcloud . '}comp-filter requires a valid name attribute');
		}

		return $componentName;
	}
}
